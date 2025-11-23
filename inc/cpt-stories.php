<?php
/**
 * Stories CPT registration.
 */

action_hook_once('init', function () {
    $labels = [
        'name'          => __('Stories', 'chroma'),
        'singular_name' => __('Story', 'chroma'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'has_archive' => true,
        'rewrite' => [
            'slug'       => 'stories',
            'with_front' => false,
        ],
        'taxonomies' => ['category', 'post_tag'],
        'menu_position' => 23,
        'menu_icon' => 'dashicons-format-aside',
    ];

    register_post_type('stories', $args);
});

add_filter('template_include', function ($template) {
    if (is_post_type_archive('stories')) {
        $archive = locate_template('archive-stories.php');
        return $archive ?: $template;
    }
    if (is_singular('stories')) {
        $single = locate_template('single-stories.php');
        return $single ?: $template;
    }
    return $template;
});
