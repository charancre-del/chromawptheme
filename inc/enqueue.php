<?php
/**
 * Enqueue scripts and styles
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'chroma_enqueue_assets' );
function chroma_enqueue_assets() {

    $version = wp_get_theme()->get( 'Version' );

    // ---------------------------------------------------------
    // 1. PRECONNECT FOR PERFORMANCE
    // ---------------------------------------------------------
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";

    // ---------------------------------------------------------
    // 2. GOOGLE FONTS (Inter + Playfair Display, as requested)
    // ---------------------------------------------------------
    wp_enqueue_style(
        'chroma-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap',
        [],
        null
    );

    // ---------------------------------------------------------
    // 3. MAIN COMPILED TAILWIND CSS
    // ---------------------------------------------------------
    wp_enqueue_style(
        'chroma-main-css',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime( get_template_directory() . '/assets/css/main.css' )
    );

    // ---------------------------------------------------------
    // 4. MAIN JS (global behaviors)
    // ---------------------------------------------------------
    wp_enqueue_script(
        'chroma-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime( get_template_directory() . '/assets/js/main.js' ),
        true
    );

    // ---------------------------------------------------------
    // 5. MAP JS (conditionally used)
    // Load only on Location archive + Location single templates
    // ---------------------------------------------------------
    if ( is_singular( 'location' ) || is_post_type_archive( 'location' ) || is_page( 'locations' ) ) {

        // Load Leaflet (CSS + JS) for maps
        wp_enqueue_style(
            'leaflet-css',
            'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
            [],
            '1.9.4'
        );

        wp_enqueue_script(
            'leaflet-js',
            'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
            [],
            '1.9.4',
            true
        );

        // Load our map integration layer
        wp_enqueue_script(
            'chroma-map-js',
            get_template_directory_uri() . '/assets/js/map-layer.js',
            [ 'leaflet-js' ],
            filemtime( get_template_directory() . '/assets/js/map-layer.js' ),
            true
        );
    }
}


// ---------------------------------------------------------
// REMOVE JQUERY MIGRATE (performance improvement)
// ---------------------------------------------------------
add_filter( 'wp_default_scripts', 'chroma_remove_jquery_migrate' );
function chroma_remove_jquery_migrate( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $jquery = $scripts->registered['jquery'];

        if ( $jquery->deps ) { // Check whether the script has any dependencies
            $jquery->deps = array_diff( $jquery->deps, [ 'jquery-migrate' ] );
        }
    }
}


// ---------------------------------------------------------
// REMOVE UNNEEDED EMBED + BLOCK LIB SCRIPTS
// ---------------------------------------------------------
add_action( 'wp_footer', 'chroma_cleanup_footer_scripts', 1 );
function chroma_cleanup_footer_scripts() {
    wp_deregister_script( 'wp-embed' );
    wp_dequeue_style( 'wp-block-library' );
}


// ---------------------------------------------------------
// ADMIN STYLES (optional)
// ---------------------------------------------------------
add_action( 'admin_enqueue_scripts', 'chroma_admin_styles' );
function chroma_admin_styles() {
    wp_enqueue_style(
        'chroma-admin-css',
        get_template_directory_uri() . '/assets/css/admin.css',
        [],
        '1.0.0'
    );
}


