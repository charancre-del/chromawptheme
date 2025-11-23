<?php
/**
 * Theme setup.
 */

action_hook_once('after_setup_theme', function () {
    load_theme_textdomain('chroma', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style']);
    add_theme_support('editor-styles');
    add_theme_support('automatic-feed-links');

    register_nav_menus([
        'primary' => __('Primary Menu', 'chroma'),
        'utility' => __('Utility Menu', 'chroma'),
    ]);

    add_image_size('chroma-card', 800, 600, true);
    add_image_size('chroma-hero', 1600, 900, true);

    register_sidebar([
        'name' => __('Footer Column 1', 'chroma'),
        'id' => 'footer-1',
        'before_widget' => '<section class="widget footer-widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => __('Footer Column 2', 'chroma'),
        'id' => 'footer-2',
        'before_widget' => '<section class="widget footer-widget">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
});

/**
 * Helper to run anonymous callbacks once for an action.
 */
function action_hook_once(string $hook, callable $callback, int $priority = 10): void
{
    add_action($hook, $callback, $priority);
}
