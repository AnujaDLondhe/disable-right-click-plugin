<?php
/*
Plugin Name: Content Guard – Disable Right Click & Protect Content
Description: Protect your content by disabling right-click, copy, devtools, and more.
Version: 2.0
Author: Anuja Londhe 
*/

if (!defined('ABSPATH')) exit;

require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';

function cg_load_scripts() {
    $options = get_option('cg_protection_options');
    if (isset($options['enable_protection']) && $options['enable_protection']) {
        wp_enqueue_script('cg-protection', plugin_dir_url(__FILE__) . 'assets/protection.js', [], false, true);
        wp_localize_script('cg-protection', 'cg_alert', [
            'right_click' => $options['custom_message'] ?? 'Right-click is disabled!',
            'copy' => 'Copying is not allowed.',
            'cut' => 'Cutting is not allowed.',
            'paste' => 'Pasting is not allowed.',
            'devtools' => 'Developer tools are disabled.',
            'print' => 'Printing is disabled.',
        ]);
    }
}
add_action('wp_enqueue_scripts', 'cg_load_scripts');
