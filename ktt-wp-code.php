<?php

/**
 * KeesTalksTech Code
 *
 * @package       KTTC
 * @wordpress-plugin
 * Plugin Name:   KeesTalksTech Code
 * Plugin URI:    https://github.com/KeesCBakker/ktt-wp-code
 * Description:   A plugin to support Highlight.js and Mermaid
 * Version:       1.3.7
 * Author:        Kees C. Bakker
 * Author URI:    https://keestalkstech.com/
 * License:       MIT
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Register the updater
if (!class_exists('KttCodeUpdater')) {
    include_once(plugin_dir_path(__FILE__) . 'updater.php');
}

$updater = new KttCodeUpdater(__FILE__);
$updater->set_username('KeesCBakker');
$updater->set_repository('ktt-wp-code');
$updater->initialize();

// Add "Check for Updates" link to plugin action links
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_check_for_updates_link');
function add_check_for_updates_link($links)
{
    $check_update_link = '<a href="' . esc_url(add_query_arg('check_for_update', '1')) . '">Check for Updates</a>';
    array_unshift($links, $check_update_link);
    return $links;
}

// Check for update on request
add_action('admin_init', 'check_for_manual_plugin_update');
function check_for_manual_plugin_update()
{
    if (is_admin() && isset($_GET['check_for_update']) && $_GET['check_for_update'] == '1') {
        // Trigger the update check
        $transient = get_site_transient('update_plugins');
        global $updater;
        $updater->modify_transient($transient);
        set_site_transient('update_plugins', $transient);

        // Redirect to plugins page to show any update results
        wp_safe_redirect(admin_url('plugins.php'));
        exit;
    }
}

// (Rest of your plugin code)
function enqueue_language_highlight_js()
{
    global $post;

    if (is_singular() && has_blocks($post->post_content)) {
        $blocks = parse_blocks($post->post_content);

        // Define language remappings
        $language_map = array(
            'sh' => 'bash',
            'docker' => 'dockerfile',
            'ps' => 'powershell'
        );

        $languages = array();
        foreach ($blocks as $block) {
            if ($block['blockName'] === 'core/code') {
                $block_classes = explode(' ', $block['attrs']['className'] ?? '');
                foreach ($block_classes as $class) {
                    if (strpos($class, 'lang-') === 0 || strpos($class, 'language-') === 0) {
                        $lang = str_replace(array('lang-', 'language-'), '', $class);
                        $lang = $language_map[$lang] ?? $lang;
                        $languages[$lang] = true;
                    }
                }
            }
        }

        if (isset($languages["mermaid"]) && $languages["mermaid"] == true) {
            $script_url = plugins_url('lib/mermaid/mermaid.min.js', __FILE__);
            wp_enqueue_script('mermaid-js', $script_url, array(), null, true);

            $script_url = plugins_url('js/mermaid.js', __FILE__);
            wp_enqueue_script('mermaid-client-js', $script_url, array('mermaid-js'), null, true);

            $style_url = plugins_url('css/mermaid.css', __FILE__);
            wp_enqueue_style('mermaid-client-style', $style_url, array(), null);
        }

        $script_url = plugins_url('lib/highlight/highlight.min.js', __FILE__);
        wp_enqueue_script('highlight-js', $script_url, array(), null, true);

        foreach (array_keys($languages) as $lang) {
            $file_path = plugin_dir_path(__FILE__) . "lib/highlight/languages/{$lang}.min.js";
            if (file_exists($file_path)) {
                $script_url = plugins_url("lib/highlight/languages/{$lang}.min.js", __FILE__);
                wp_enqueue_script("highlight-js-{$lang}", $script_url, array(), null, true);
            }
        }

        $script_url = plugins_url('lib/highlightjs-copy/highlightjs-copy.min.js', __FILE__);
        wp_enqueue_script('highlight-copy-js', $script_url, array(), null, true);

        $style_url = plugins_url('lib/highlightjs-copy/highlightjs-copy.min.css', __FILE__);
        wp_enqueue_style('highlight-copy-js-style', $style_url, array(), null);

        $script_url = plugins_url('js/highlight.js', __FILE__);
        wp_enqueue_script('highlight-client-js', $script_url, array('highlight-js', 'highlight-copy-js'), null, true);

        $style_url = plugins_url('lib/highlight/styles/atom-one-dark.min.css', __FILE__);
        wp_enqueue_style('highlight-js-style', $style_url, array(), null);

        if (isset($languages["sho"]) && $languages["sho"] == true) {
            $script_url = plugins_url('js/sho.js', __FILE__);
            wp_enqueue_script('sho-client-js', $script_url, array('highlight-client-js'), null, true);

            $style_url = plugins_url('css/sho.css', __FILE__);
            wp_enqueue_style('sho-client-style', $style_url, array('highlight-js-style'), null);
        }

        if (isset($languages["spark_output"]) && $languages["spark_output"] == true) {
            $script_url = plugins_url('js/spark_output.js', __FILE__);
            wp_enqueue_script('sho-client-js', $script_url, array('highlight-client-js'), null, true);

            $style_url = plugins_url('css/spark_output.css', __FILE__);
            wp_enqueue_style('sho-client-style', $style_url, array('highlight-js-style'), null);
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_language_highlight_js');

function add_type_attribute($tag, $handle, $src)
{
    if ('mermaid-client-js' !== $handle) {
        return $tag;
    }
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);
