<?php
/**
 * ACF Helpers for Home Page Flexible Content
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Get the ID of the current "Home" page
 * Works whether it's set as static front page or not.
 */
function chroma_get_home_page_id() {

    // If a static front page is set
    $front_id = get_option( 'page_on_front' );
    if ( $front_id ) {
        return (int) $front_id;
    }

    // Fallback: try finding a page with slug 'home'
    $page = get_page_by_path( 'home' );
    if ( $page ) {
        return (int) $page->ID;
    }

    return 0;
}

/**
 * Generic helper to get a home page field
 */
function chroma_get_home_field( $field_key, $default = '' ) {

    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }

    $home_id = chroma_get_home_page_id();
    if ( ! $home_id ) {
        return $default;
    }

    $value = get_field( $field_key, $home_id );

    return $value === null || $value === '' ? $default : $value;
}


/**
 * HERO BLOCK
 *
 * Example fields (you can match to your ACF group):
 * - home_hero_heading
 * - home_hero_subheading
 * - home_hero_cta_label
 * - home_hero_cta_url
 * - home_hero_secondary_label
 * - home_hero_secondary_url
 */
function chroma_home_hero() {
    return [
        'heading'          => chroma_get_home_field( 'home_hero_heading', '' ),
        'subheading'       => chroma_get_home_field( 'home_hero_subheading', '' ),
        'cta_label'        => chroma_get_home_field( 'home_hero_cta_label', '' ),
        'cta_url'          => chroma_get_home_field( 'home_hero_cta_url', '' ),
        'secondary_label'  => chroma_get_home_field( 'home_hero_secondary_label', '' ),
        'secondary_url'    => chroma_get_home_field( 'home_hero_secondary_url', '' ),
    ];
}

function chroma_home_has_hero() {
    $hero = chroma_home_hero();
    return ! empty( $hero['heading'] );
}


/**
 * STATS STRIP
 *
 * Example repeater: home_stats (array of rows with label + value)
 */
function chroma_home_stats() {
    $stats = chroma_get_home_field( 'home_stats', [] );
    return is_array( $stats ) ? $stats : [];
}

function chroma_home_has_stats() {
    $stats = chroma_home_stats();
    return ! empty( $stats );
}


/**
 * FLEXIBLE CONTENT SECTIONS
 *
 * ACF Flexible Content: home_sections
 * You can have layouts like:
 * - 'programs_grid'
 * - 'locations_teaser'
 * - 'testimonials'
 * - 'call_to_action'
 */
function chroma_home_sections() {
    $sections = chroma_get_home_field( 'home_sections', [] );
    return is_array( $sections ) ? $sections : [];
}

function chroma_home_has_sections() {
    $sections = chroma_home_sections();
    return ! empty( $sections );
}


/**
 * FAQ SECTION
 *
 * Repeater: home_faq_items
 * - question
 * - answer
 */
function chroma_home_faq_items() {
    $items = chroma_get_home_field( 'home_faq_items', [] );
    return is_array( $items ) ? $items : [];
}

function chroma_home_has_faq() {
    $items = chroma_home_faq_items();
    return ! empty( $items );
}


/**
 * HOME: FEATURED LOCATIONS SELECTION
 *
 * e.g. a Relationship field: home_featured_locations
 */
function chroma_home_featured_locations() {
    $locations = chroma_get_home_field( 'home_featured_locations', [] );
    return is_array( $locations ) ? $locations : [];
}

function chroma_home_has_featured_locations() {
    $locations = chroma_home_featured_locations();
    return ! empty( $locations );
}


/**
 * HOME: FEATURED STORIES (BLOG)
 *
 * e.g. Relationship field: home_featured_stories
 */
function chroma_home_featured_stories() {
    $stories = chroma_get_home_field( 'home_featured_stories', [] );
    return is_array( $stories ) ? $stories : [];
}

function chroma_home_has_featured_stories() {
    $stories = chroma_home_featured_stories();
    return ! empty( $stories );
}