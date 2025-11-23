<?php
/**
 * Custom Post Type: Locations
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'chroma_register_locations_cpt' );
function chroma_register_locations_cpt() {

    $labels = [
        'name'                  => __( 'Locations', 'chroma' ),
        'singular_name'         => __( 'Location', 'chroma' ),
        'menu_name'             => __( 'Locations', 'chroma' ),
        'name_admin_bar'        => __( 'Location', 'chroma' ),
        'add_new'               => __( 'Add New', 'chroma' ),
        'add_new_item'          => __( 'Add New Location', 'chroma' ),
        'new_item'              => __( 'New Location', 'chroma' ),
        'edit_item'             => __( 'Edit Location', 'chroma' ),
        'view_item'             => __( 'View Location', 'chroma' ),
        'all_items'             => __( 'All Locations', 'chroma' ),
        'search_items'          => __( 'Search Locations', 'chroma' ),
        'parent_item_colon'     => __( 'Parent Location:', 'chroma' ),
        'not_found'             => __( 'No locations found.', 'chroma' ),
        'not_found_in_trash'    => __( 'No locations found in Trash.', 'chroma' ),
        'featured_image'        => __( 'Location Photo', 'chroma' ),
        'set_featured_image'    => __( 'Set location photo', 'chroma' ),
        'remove_featured_image' => __( 'Remove location photo', 'chroma' ),
        'use_featured_image'    => __( 'Use as location photo', 'chroma' ),
        'archives'              => __( 'Location archives', 'chroma' ),
        'insert_into_item'      => __( 'Insert into location', 'chroma' ),
        'uploaded_to_this_item' => __( 'Uploaded to this location', 'chroma' ),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-location-alt',
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'has_archive'        => true,
        'rewrite'            => [
            'slug'       => 'locations', // main archive: /locations/
            'with_front' => false,
        ],
        'publicly_queryable' => true,
        'hierarchical'       => false,
        'show_in_nav_menus'  => true,
        'show_ui'            => true,
        'capability_type'    => 'post',
    ];

    register_post_type( 'location', $args );
}


// ---------------------------------------------------------
// ADMIN COLUMNS FOR LOCATIONS
// ---------------------------------------------------------

add_filter( 'manage_edit-location_columns', 'chroma_location_admin_columns' );
function chroma_location_admin_columns( $columns ) {

    $new = [];

    $new['cb']        = $columns['cb'];
    $new['title']     = __( 'Location', 'chroma' );
    $new['city']      = __( 'City', 'chroma' );
    $new['state']     = __( 'State', 'chroma' );
    $new['phone']     = __( 'Phone', 'chroma' );
    $new['capacity']  = __( 'Capacity / Enrolled', 'chroma' );
    $new['date']      = $columns['date'];

    return $new;
}

add_action( 'manage_location_posts_custom_column', 'chroma_location_admin_column_content', 10, 2 );
function chroma_location_admin_column_content( $column, $post_id ) {

    if ( ! function_exists( 'get_field' ) ) {
        // If ACF is not available, don’t break the admin.
        return;
    }

    switch ( $column ) {

        case 'city':
            $city = get_field( 'location_city', $post_id );
            echo $city ? esc_html( $city ) : '—';
            break;

        case 'state':
            $state = get_field( 'location_state', $post_id );
            echo $state ? esc_html( $state ) : '—';
            break;

        case 'phone':
            $phone = get_field( 'location_phone', $post_id );
            if ( $phone ) {
                echo '<a href="tel:' . esc_attr( preg_replace( '/\D+/', '', $phone ) ) . '">' . esc_html( $phone ) . '</a>';
            } else {
                echo '—';
            }
            break;

        case 'capacity':
            // Optional ACF fields you can add:
            // - location_capacity
            // - location_enrollment
            $capacity   = get_field( 'location_capacity', $post_id );
            $enrollment = get_field( 'location_enrollment', $post_id );

            if ( $capacity || $enrollment ) {
                echo esc_html( (int) $enrollment ) . ' / ' . esc_html( (int) $capacity );
            } else {
                echo '—';
            }
            break;
    }
}


// ---------------------------------------------------------
// LOCATION TITLE PLACEHOLDER (EDITOR UX)
// ---------------------------------------------------------
add_filter( 'enter_title_here', 'chroma_location_title_placeholder', 10, 2 );
function chroma_location_title_placeholder( $placeholder, $post ) {
    if ( $post->post_type === 'location' ) {
        return __( 'Location name (e.g. Chroma Early Learning – Johns Creek)', 'chroma' );
    }
    return $placeholder;
}


// ---------------------------------------------------------
// SORTABLE COLUMNS (OPTIONAL)
// ---------------------------------------------------------
add_filter( 'manage_edit-location_sortable_columns', 'chroma_location_sortable_columns' );
function chroma_location_sortable_columns( $columns ) {
    $columns['city']  = 'city';
    $columns['state'] = 'state';
    return $columns;
}

add_action( 'pre_get_posts', 'chroma_location_column_ordering' );
function chroma_location_column_ordering( $query ) {
    if ( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    $orderby = $query->get( 'orderby' );

    if ( 'city' === $orderby ) {
        $query->set( 'meta_key', 'location_city' );
        $query->set( 'orderby', 'meta_value' );
    }

    if ( 'state' === $orderby ) {
        $query->set( 'meta_key', 'location_state' );
        $query->set( 'orderby', 'meta_value' );
    }
}