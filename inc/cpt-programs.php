<?php
/**
 * Programs CPT registration.
 */

action_hook_once('init', function () {
    $labels = [
        'name' => __('Programs', 'chroma'),
        'singular_name' => __('Program', 'chroma'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'programs',
            'with_front' => false,
        ],
        'menu_position' => 21,
        'menu_icon' => 'dashicons-welcome-learn-more',
    ];

    register_post_type('program', $args);
});

add_action('add_meta_boxes_program', function () {
    add_meta_box('program_hooks', __('Program Hooks', 'chroma'), 'chroma_program_hooks_metabox', 'program', 'side', 'default');
});

function chroma_program_hooks_metabox(): void
{
    echo '<p>' . esc_html__('Hooks fire before and after program sections for custom integrations.', 'chroma') . '</p>';
    echo '<code>do_action(\'chroma_before_program\');</code><br />';
    echo '<code>do_action(\'chroma_after_program\');</code>';
}
