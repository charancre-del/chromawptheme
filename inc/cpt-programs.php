<?php
/**
 * Custom Post Type: Programs
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'chroma_register_programs_cpt' );
function chroma_register_programs_cpt() {

    $labels = [
        'name'                  => __( 'Programs', 'chroma' ),
        'singular_name'         => __( 'Program', 'chroma' ),
        'menu_name'             => __( 'Programs', 'chroma' ),
        'name_admin_bar'        => __( 'Program', 'chroma' ),
        'add_new'               => __( 'Add New', 'chroma' ),
        'add_new_item'          => __( 'Add New Program', 'chroma' ),
        'new_item'              => __( 'New Program', 'chroma' ),
        'edit_item'             => __( 'Edit Program', 'chroma' ),
        'view_item'             => __( 'View Program', 'chroma' ),
        'all_items'             => __( 'All Programs', 'chroma' ),
        'search_items'          => __( 'Search Programs', 'chroma' ),
        'parent_item_colon'     => __( 'Parent Program:', 'chroma' ),
        'not_found'             => __( 'No programs found.', 'chroma' ),
        'not_found_in_trash'    => __( 'No programs found in Trash.', 'chroma' ),
        'featured_image'        => __( 'Program Image', 'chroma' ),
        'set_featured_image'    => __( 'Set program image', 'chroma' ),
        'remove_featured_image' => __( 'Remove program image', 'chroma' ),
        'use_featured_image'    => __( 'Use as program image', 'chroma' ),
        'archives'              => __( 'Program archives', 'chroma' ),
        'insert_into_item'      => __( 'Insert into program', 'chroma' ),
        'uploaded_to_this_item' => __( 'Uploaded to this program', 'chroma' ),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true, // Gutenberg + API
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'has_archive'        => true,
        'rewrite'            => [
            'slug'       => 'programs', // base /programs/...
            'with_front' => false,
        ],
        'publicly_queryable' => true,
        'hierarchical'       => false,
        'show_in_nav_menus'  => true,
        'show_ui'            => true,
        'capability_type'    => 'post',
    ];

    register_post_type( 'program', $args );
}


// ---------------------------------------------------------
// ADMIN COLUMNS FOR PROGRAMS
// ---------------------------------------------------------

add_filter( 'manage_edit-program_columns', 'chroma_program_admin_columns' );
function chroma_program_admin_columns( $columns ) {

    $new = [];

    $new['cb']          = $columns['cb'];
    $new['title']       = __( 'Program', 'chroma' );
    $new['age_range']   = __( 'Age Range', 'chroma' );
    $new['locations']   = __( 'Offered At', 'chroma' );
    $new['date']        = $columns['date'];

    return $new;
}

add_action( 'manage_program_posts_custom_column', 'chroma_program_admin_column_content', 10, 2 );
function chroma_program_admin_column_content( $column, $post_id ) {

    if ( ! function_exists( 'get_field' ) ) {
        // If ACF isn’t loaded, skip fancy stuff.
        return;
    }

    switch ( $column ) {

        case 'age_range':
            $age = get_field( 'program_age_range', $post_id );
            echo $age ? esc_html( $age ) : '—';
            break;

        case 'locations':
            // Optional: ACF relationship field 'program_locations' linking to location CPT
            $locations = get_field( 'program_locations', $post_id );
            if ( ! empty( $locations ) && is_array( $locations ) ) {
                $names = [];
                foreach ( $locations as $loc ) {
                    $names[] = esc_html( get_the_title( $loc ) );
                }
                echo implode( ', ', $names );
            } else {
                echo '—';
            }
            break;
    }
}


// ---------------------------------------------------------
// PROGRAM TITLE PLACEHOLDER (EDITOR UX)
// ---------------------------------------------------------
add_filter( 'enter_title_here', 'chroma_program_title_placeholder', 10, 2 );
function chroma_program_title_placeholder( $placeholder, $post ) {
    if ( $post->post_type === 'program' ) {
        return __( 'Program name (e.g. Infant Care, Georgia Pre-K)', 'chroma' );
    }
    return $placeholder;
}