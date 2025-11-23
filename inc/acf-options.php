<?php
/**
 * ACF Options Page & Global Helpers
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register ACF Options Page
 */
add_action( 'acf/init', 'chroma_register_acf_options_page' );
function chroma_register_acf_options_page() {

    if ( ! function_exists( 'acf_add_options_page' ) ) {
        return;
    }

    acf_add_options_page([
        'page_title'  => 'Chroma Global Settings',
        'menu_title'  => 'Chroma Settings',
        'menu_slug'   => 'chroma-global-settings',
        'capability'  => 'manage_options',
        'redirect'    => false,
        'position'    => 59,
        'icon_url'    => 'dashicons-admin-generic',
    ]);
}

/**
 * Global helper to get an option field safely
 *
 * Usage:
 *  chroma_get_option( 'global_phone' );
 *  chroma_get_option( 'global_email' );
 */
function chroma_get_option( $field_key, $default = '' ) {

    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }

    $value = get_field( $field_key, 'option' );

    if ( $value === null || $value === '' ) {
        return $default;
    }

    return $value;
}

/**
 * Convenience wrappers
 */

function chroma_global_phone() {
    return chroma_get_option( 'global_phone', '' );
}

function chroma_global_email() {
    return chroma_get_option( 'global_email', '' );
}

function chroma_global_tour_email() {
    return chroma_get_option( 'global_tour_email', chroma_global_email() );
}

function chroma_global_address() {
    return chroma_get_option( 'global_address', '' );
}

function chroma_global_city() {
    return chroma_get_option( 'global_city', '' );
}

function chroma_global_state() {
    return chroma_get_option( 'global_state', 'GA' );
}

function chroma_global_zip() {
    return chroma_get_option( 'global_zip', '' );
}

function chroma_global_full_address() {
    $parts = array_filter([
        chroma_global_address(),
        chroma_global_city(),
        chroma_global_state(),
        chroma_global_zip(),
    ]);
    return implode( ', ', $parts );
}

function chroma_global_facebook() {
    return chroma_get_option( 'global_facebook_url', '' );
}

function chroma_global_instagram() {
    return chroma_get_option( 'global_instagram_url', '' );
}

function chroma_global_linkedin() {
    return chroma_get_option( 'global_linkedin_url', '' );
}

function chroma_global_default_seo_title() {
    return chroma_get_option( 'global_seo_default_title', get_bloginfo( 'name' ) );
}

function chroma_global_default_seo_description() {
    return chroma_get_option( 'global_seo_default_description', get_bloginfo( 'description' ) );
}