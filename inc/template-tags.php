<?php
/**
 * Template tags and helpers
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Safe trimmed excerpt
 *
 * @param int $length
 * @return string
 */
function chroma_trimmed_excerpt( $length = 24 ) {
    $text = get_the_excerpt();

    if ( ! $text ) {
        $text = get_the_content();
    }

    $text = wp_strip_all_tags( $text );
    $words = preg_split( '/\s+/', $text );

    if ( count( $words ) > $length ) {
        $words = array_slice( $words, 0, $length );
        $text  = implode( ' ', $words ) . '…';
    } else {
        $text = implode( ' ', $words );
    }

    return esc_html( $text );
}


/**
 * Eyebrow text (small label above titles)
 *
 * @param string $text
 */
function chroma_eyebrow( $text ) {
    if ( ! $text ) return;
    echo '<p class="text-xs font-semibold tracking-[0.12em] uppercase text-brand-gold mb-2">'
        . esc_html( $text )
        . '</p>';
}


/**
 * Pagination for archives (Stories, Programs, etc.)
 */
function chroma_archive_pagination() {

    global $wp_query;

    if ( $wp_query->max_num_pages <= 1 ) return;

    $big = 999999999;

    $links = paginate_links([
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
    ]);

    if ( empty( $links ) || ! is_array( $links ) ) return;

    echo '<nav class="mt-10 flex justify-center" aria-label="Pagination">';
    echo '<ul class="inline-flex items-center gap-2 text-sm">';

    foreach ( $links as $link ) {
        // Add Tailwind classes
        $class = 'min-w-[2.25rem] h-9 inline-flex items-center justify-center rounded-full px-3';

        if ( strpos( $link, 'current' ) !== false ) {
            $class .= ' bg-brand-navy text-white';
            $link = str_replace( 'page-numbers current', $class, $link );
        } elseif ( strpos( $link, 'prev' ) !== false || strpos( $link, 'next' ) !== false ) {
            $class .= ' border border-slate-200 hover:border-brand-navy hover:text-brand-navy';
            $link = str_replace( 'page-numbers', $class, $link );
        } else {
            $class .= ' border border-slate-200 hover:border-brand-navy hover:text-brand-navy';
            $link = str_replace( 'page-numbers', $class, $link );
        }

        echo '<li>' . $link . '</li>';
    }

    echo '</ul>';
    echo '</nav>';
}


/**
 * Print a location's formatted address (one-line)
 *
 * @param int|\WP_Post|null $post
 */
function chroma_location_address_line( $post = null ) {
    if ( ! function_exists( 'get_field' ) ) return;

    $post = get_post( $post );
    if ( ! $post || $post->post_type !== 'location' ) return;

    $street = get_field( 'location_address', $post->ID );
    $city   = get_field( 'location_city', $post->ID );
    $state  = get_field( 'location_state', $post->ID );
    $zip    = get_field( 'location_zip', $post->ID );

    $parts = array_filter([
        $street,
        $city,
        $state,
        $zip,
    ]);

    if ( empty( $parts ) ) return;

    echo esc_html( implode( ', ', $parts ) );
}


/**
 * Get city + state string for a location
 *
 * @param int|\WP_Post|null $post
 * @return string
 */
function chroma_location_city_state( $post = null ) {
    if ( ! function_exists( 'get_field' ) ) return '';

    $post = get_post( $post );
    if ( ! $post || $post->post_type !== 'location' ) return '';

    $city  = get_field( 'location_city', $post->ID );
    $state = get_field( 'location_state', $post->ID );

    if ( ! $city && ! $state ) {
        return '';
    }

    $parts = array_filter([ $city, $state ]);
    return implode( ', ', $parts );
}


/**
 * Simple utility: render a badge
 *
 * @param string $text
 */
function chroma_badge( $text ) {
    if ( ! $text ) return;
    echo '<span class="inline-flex items-center rounded-full bg-brand-cream px-3 py-1 text-xs font-medium text-brand-navy">'
        . esc_html( $text )
        . '</span>';
}