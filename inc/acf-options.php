<?php
/**
 * ACF Options page.
 */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => __('Chroma Theme Settings', 'chroma'),
        'menu_title' => __('Chroma Settings', 'chroma'),
        'menu_slug' => 'chroma-settings',
        'capability' => 'manage_options',
        'redirect' => false,
    ]);
}
