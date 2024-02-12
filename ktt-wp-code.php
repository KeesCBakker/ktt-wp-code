<?php

/**
 * KeesTalksTech Code
 *
 * @package       KTTC
 * @author        Kees C. Bakker
 * @license       gplv2
 * @version       1.1.1
 *
 * @wordpress-plugin
 * Plugin Name:   KeesTalksTech Code
 * Plugin URI:    https://github.com/KeesCBakker/ktt-wp-code
 * Description:   A plugin to support Highlight.js and Mermaid
 * Version:       1.1.2
 * Author:        Kees C. Bakker
 * Author URI:    https://keestalkstech.com/
 * Text Domain:   ktt-wp-code
 * Domain Path:   /ktt-wp-code
 * License:       MIT
 * License URI:   https://github.com/KeesCBakker/ktt-wp-code/LICENSE
 *
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/* REGISTER THE UPDATER */
if (!class_exists('KttCodeUpdater')) {
    include_once(plugin_dir_path(__FILE__) . 'updater.php');
}

$updater = new KttCodeUpdater(__FILE__);
$updater->set_username('KeesCBakker');
$updater->set_repository('ktt-wp-code');
$updater->initialize();

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
                        // Apply remapping if exists
                        $lang = $language_map[$lang] ?? $lang;
                        $languages[$lang] = true; // Use keys to avoid duplicates
                    }
                }
            }
        }

        // include mermaid and start script
        if (isset($languages["mermaid"]) && $languages["mermaid"] == true) {
            $script_url = plugins_url('lib/mermaid/mermaid.min.js', __FILE__);
            wp_enqueue_script('mermaid-js', $script_url, array(), null, true);

            $script_url = plugins_url('js/mermaid.js', __FILE__);
            wp_enqueue_script('mermaid-client-js', $script_url, array('mermaid-js'), null, true);

            $style_url = plugins_url('css/mermaid.css', __FILE__);
            wp_enqueue_style('mermaid-client-style', $style_url, array(), null);
        }

        // load main highlight, highlight+copy and language js + css
        $script_url = plugins_url('lib/highlight/highlight.min.js', __FILE__);
        wp_enqueue_script('highlight-js', $script_url, array(), null, true);

        $script_url = plugins_url('lib/highlightjs-copy/highlightjs-copy.min.js', __FILE__);
        wp_enqueue_script('highlight-copy-js', $script_url, array(), null, true);

        $style_url = plugins_url('lib/highlightjs-copy/highlightjs-copy.min.css', __FILE__);
        wp_enqueue_style('highlight-copy-js-style', $style_url, array(), null);

        foreach (array_keys($languages) as $lang) {
            $file_path = plugin_dir_path(__FILE__) . "lib/highlight/languages/{$lang}.min.js";
            if (file_exists($file_path)) {
                $script_url = plugins_url("lib/highlight/languages/{$lang}.min.js", __FILE__);
                wp_enqueue_script("highlight-js-{$lang}", $script_url, array(), null, true);
            }
        }

        $script_url = plugins_url('js/highlight.js', __FILE__);
        wp_enqueue_script('highlight-client-js', $script_url, array('highlight-copy-js'), null, true);

        // load theme
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
    // if not your script, do nothing and return original $tag
    if ('mermaid-client-js' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);
