<?php

/**
 * KeesTalksTech Code
 *
 * @package       KTTC
 * @author        Kees . Bakker
 * @license       gplv2
 * @version       0.7
 *
 * @wordpress-plugin
 * Plugin Name:   KeesTalksTech Code
 * Plugin URI:    https://github.com/KeesCBakker/ktt-wp-code
 * Description:   A plugin to support Highlight.js and Mermaid
 * Version:       0.1
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

// $updater = new KttCodeUpdater(__FILE__);
// $updater->set_username('KeesCBakker');
// $updater->set_repository('ktt-code');
// $updater->initialize();

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

        $script_url = plugins_url('lib/highlight/highlight.min.js', __FILE__);
        wp_enqueue_script('highlight-js', $script_url, array(), null, true);

        foreach (array_keys($languages) as $lang) {
            $file_path = plugin_dir_path(__FILE__) . "lib/highlight/languages/{$lang}.min.js";
            if (file_exists($file_path)) {
                $script_url = plugins_url("lib/highlight/languages/{$lang}.min.js", __FILE__);
                wp_enqueue_script("highlight-js-{$lang}", $script_url, array(), null, true);
            }
        }

        wp_add_inline_script('highlight-js', 'document.addEventListener("DOMContentLoaded", function() { hljs.highlightAll(); });');

        // Enqueue the highlight.js style
        $style_url = plugins_url('lib/highlight/styles/atom-one-dark.min.css', __FILE__);
        wp_enqueue_style('highlight-js-style', $style_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_language_highlight_js');
