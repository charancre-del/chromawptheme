<?php
/**
 * City → slug helper for Locations (NO auto-slugging)
 * Chroma Excellence Theme
 *
 * This DOES NOT modify post_name automatically.
 * It only shows an SEO-friendly suggested slug + URL in the admin UI.
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Generate a recommended slug for a location based on city + state
 *
 * Pattern: service-areas-{city}-{state}
 * Example: service-areas-johns-creek-ga
 *
 * @param string $city
 * @param string $state
 * @return string
 */
function chroma_generate_location_slug_from_city_state( $city, $state = 'GA' ) {

    $city  = trim( (string) $city );
    $state = strtoupper( trim( (string) $state ) ?: 'GA' );

    if ( ! $city ) {
        return '';
    }

    // Normalize city to something like "johns-creek"
    $city_slug  = sanitize_title( $city );
    $state_slug = strtolower( preg_replace( '/[^A-Za-z]/', '', $state ) );

    // Fallback if state becomes empty
    if ( ! $state_slug ) {
        $state_slug = 'ga';
    }

    return sprintf( 'service-areas-%s-%s', $city_slug, $state_slug );
}


/**
 * Add a metabox in Location edit screen to show the recommended slug
 */
add_action( 'add_meta_boxes', 'chroma_location_slug_suggestion_metabox' );
function chroma_location_slug_suggestion_metabox() {

    add_meta_box(
        'chroma_location_slug_suggestion',
        __( 'SEO URL Suggestion', 'chroma' ),
        'chroma_render_location_slug_suggestion_metabox',
        'location',
        'side',
        'default'
    );
}


/**
 * Render the metabox content
 */
function chroma_render_location_slug_suggestion_metabox( $post ) {

    if ( ! function_exists( 'get_field' ) ) {
        echo '<p class="description">ACF not active. URL suggestion unavailable.</p>';
        return;
    }

    $city  = get_field( 'location_city', $post->ID );
    $state = get_field( 'location_state', $post->ID ) ?: 'GA';

    $suggested_slug = chroma_generate_location_slug_from_city_state( $city, $state );
    $current_slug   = $post->post_name;
    $base_url       = home_url( '/' );

    echo '<div style="font-size:13px; line-height:1.5;">';

    if ( ! $city ) {
        echo '<p><strong>Step 1:</strong> Fill in the <em>City</em> field for this location and update the post.</p>';
        echo '<p>Once saved, a suggested SEO-friendly URL slug will appear here.</p>';
        echo '</div>';
        return;
    }

    if ( ! $suggested_slug ) {
        echo '<p>Unable to generate suggestion. Check the city/state fields.</p>';
        echo '</div>';
        return;
    }

    // Full suggested URL
    $suggested_url = trailingslashit( $base_url . $suggested_slug );

    echo '<p><strong>Suggested slug:</strong><br />';
    echo '<code>' . esc_html( $suggested_slug ) . '</code></p>';

    echo '<p><strong>Suggested full URL:</strong><br />';
    echo '<code>' . esc_html( $suggested_url ) . '</code></p>';

    echo '<hr />';

    echo '<p><strong>Current slug:</strong><br />';
    echo '<code>' . esc_html( $current_slug ) . '</code></p>';

    echo '<p class="description" style="margin-top:8px;">';
    echo 'To use this suggestion, edit the <strong>Permalink</strong> / <strong>URL Slug</strong> above the title and paste the suggested slug.';
    echo '</p>';

    echo '</div>';
}