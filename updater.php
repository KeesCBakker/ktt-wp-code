<?php

class KttCodeUpdater
{
  private $file;
  private $plugin;
  private $basename;
  private $active;
  private $username;
  private $repository;
  private $authorize_token;
  private $github_response;

  public function __construct($file)
  {
    $this->file = $file;
    add_action('admin_init', array($this, 'set_plugin_properties'));
    return $this;
  }

  public function set_plugin_properties()
  {
    $this->plugin  = get_plugin_data($this->file);
    $this->basename = plugin_basename($this->file);
    $this->active  = is_plugin_active($this->basename);
  }

  public function set_username($username)
  {
    $this->username = $username;
  }

  public function set_repository($repository)
  {
    $this->repository = $repository;
  }

  public function authorize($token)
  {
    $this->authorize_token = $token;
  }

  private function get_repository_info()
  {
    if (is_null($this->github_response)) {
      $request_uri = sprintf('https://api.github.com/repos/%s/%s/releases', $this->username, $this->repository);

      $args = array();
      if ($this->authorize_token) {
        $args['headers']['Authorization'] = "Bearer {$this->authorize_token}";
      }

      $response = wp_remote_get($request_uri, $args);
      $response_body = wp_remote_retrieve_body($response);

      if (is_wp_error($response) || empty($response_body)) {
        $this->github_response = null;
        return;
      }

      $decoded_response = json_decode($response_body, true);
      if (is_array($decoded_response) && !empty($decoded_response)) {
        $this->github_response = current($decoded_response);
      } else {
        $this->github_response = null;
      }
    }
    return $this->github_response;
  }

  public function initialize()
  {
    add_filter('pre_set_site_transient_update_plugins', array($this, 'modify_transient'), 10, 1);
    add_filter('plugins_api', array($this, 'plugin_popup'), 10, 3);
    add_filter('upgrader_post_install', array($this, 'after_install'), 10, 3);

    add_filter(
      'upgrader_pre_download',
      function () {
        add_filter('http_request_args', [$this, 'download_package'], 15, 2);
        return false;
      }
    );
  }

  public function modify_transient($transient)
  {
    if (property_exists($transient, 'checked')) {
      if ($checked = $transient->checked) {
        $repo_info = $this->get_repository_info();

        if ($repo_info && version_compare($repo_info['tag_name'], $checked[$this->basename], 'gt')) {
          $new_files = $repo_info['zipball_url'];
          $slug = current(explode('/', $this->basename));

          $plugin = array(
            'url' => $this->plugin["PluginURI"],
            'slug' => $slug,
            'package' => $new_files,
            'new_version' => $repo_info['tag_name']
          );

          $transient->response[$this->basename] = (object) $plugin;
        }
      }
    }
    return $transient;
  }

  public function plugin_popup($result, $action, $args)
  {
    if (!empty($args->slug) && $args->slug == current(explode('/', $this->basename))) {
      $repo_info = $this->get_repository_info();

      if ($repo_info) {
        $plugin = array(
          'name'              => $this->plugin["Name"],
          'slug'              => $this->basename,
          'requires'          => '6.0',
          'tested'            => '6.2.2',
          'rating'            => '100.0',
          'num_ratings'       => '1337',
          'downloaded'        => '42',
          'added'             => '2023-05-27',
          'version'           => $repo_info['tag_name'],
          'author'            => $this->plugin["AuthorName"],
          'author_profile'    => $this->plugin["AuthorURI"],
          'last_updated'      => $repo_info['published_at'],
          'homepage'          => $this->plugin["PluginURI"],
          'short_description' => $this->plugin["Description"],
          'sections'          => array(
            'Description'     => $this->plugin["Description"],
            'Updates'         => $repo_info['body'],
          ),
          'download_link'    => $repo_info['zipball_url']
        );
        return (object) $plugin;
      }
    }
    return $result;
  }

  public function download_package($args, $url)
  {
    if (isset($args['filename']) && $this->authorize_token) {
      $args['headers']['Authorization'] = "token {$this->authorize_token}";
    }

    remove_filter('http_request_args', [$this, 'download_package']);
    return $args;
  }

  public function after_install($response, $hook_extra, $result)
  {
    global $wp_filesystem;

    $install_directory = plugin_dir_path($this->file);
    $wp_filesystem->move($result['destination'], $install_directory);
    $result['destination'] = $install_directory;

    if ($this->active) {
      activate_plugin($this->basename);
    }

    return $result;
  }
}
