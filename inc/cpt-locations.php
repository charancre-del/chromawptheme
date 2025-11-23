<?php
/**
 * Locations CPT registration.
 */

action_hook_once('init', function () {
    $labels = [
        'name' => __('Locations', 'chroma'),
        'singular_name' => __('Location', 'chroma'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'service-areas',
            'with_front' => false,
        ],
        'menu_position' => 22,
        'menu_icon' => 'dashicons-location',
    ];

    register_post_type('location', $args);
});

add_filter('template_include', function ($template) {
    if (is_post_type_archive('location')) {
        $archive = locate_template('archive-locations.php');
        return $archive ?: $template;
    }
    if (is_singular('location')) {
        $single = locate_template('single-location.php');
        return $single ?: $template;
    }
    return $template;
});
