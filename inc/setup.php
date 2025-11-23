<?php
/**
 * Theme Setup
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'chroma_excellence_theme_setup' );
function chroma_excellence_theme_setup() {

    // Let WordPress handle document <title> tag
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Custom logo
    add_theme_support( 'custom-logo', [
        'height'      => 120,
        'width'       => 120,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Better markup
    add_theme_support( 'html5', [
        'comment-list',
        'comment-form',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
        'search-form',
    ]);

    // Theme translations
    load_theme_textdomain( 'chroma', get_template_directory() . '/languages' );

    // Editor styles
    add_editor_style( 'assets/css/main.css' );

    // Register nav menus
    register_nav_menus([
        'primary'   => __( 'Primary Menu', 'chroma' ),
        'footer'    => __( 'Footer Menu', 'chroma' ),
        'topmenu'   => __( 'Top Utility Menu', 'chroma' ),
    ]);

    // Image sizes for Chroma
    add_image_size( 'chroma_thumb', 480, 320, true );
    add_image_size( 'chroma_square', 600, 600, true );
    add_image_size( 'chroma_wide', 1200, 600, true );
    add_image_size( 'chroma_hero', 1800, 900, true );
}


// ---------------------------------------------------------
// DISABLE UNNEEDED WP FEATURES FOR PERFORMANCE
// ---------------------------------------------------------

add_action( 'init', 'chroma_excellence_cleanup_wp' );
function chroma_excellence_cleanup_wp() {

    // Remove emoji scripts/styles
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // Remove oEmbed junk
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );

    // Remove RSD link
    remove_action( 'wp_head', 'rsd_link' );

    // Remove WLW manifest
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Remove shortlink
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );

    // Disable REST output in head
    remove_action( 'wp_head', 'rest_output_link_wp_head' );

    // Remove generator meta tag
    remove_action( 'wp_head', 'wp_generator' );
}


// ---------------------------------------------------------
// ACF LOCAL JSON SUPPORT
// ---------------------------------------------------------
add_filter( 'acf/settings/save_json', 'chroma_acf_json_save_point' );
function chroma_acf_json_save_point( $path ) {
    return get_template_directory() . '/acf-json';
}

add_filter( 'acf/settings/load_json', 'chroma_acf_json_load_point' );
function chroma_acf_json_load_point( $paths ) {

    // Remove original path
    unset( $paths[0] );

    // Add our theme directory
    $paths[] = get_template_directory() . '/acf-json';

    return $paths;
}
