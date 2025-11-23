<?php
/**
 * Cleanup WP head and defaults.
 */

action_hook_once('init', function () {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
});

action_hook_once('after_setup_theme', function () {
    add_filter('emoji_svg_url', '__return_false');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
});
