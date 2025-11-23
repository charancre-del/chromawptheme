<?php
/**
 * Monthly SEO Cron
 * Chroma Excellence Theme
 *
 * - Adds a "monthly" interval to WP Cron
 * - Schedules a monthly SEO maintenance job
 * - Provides a hook for sitemap pings / SEO housekeeping
 */

if ( ! defined( 'ABSPATH' ) ) exit;


// ---------------------------------------------------------
// 1. ADD MONTHLY INTERVAL
// ---------------------------------------------------------

add_filter( 'cron_schedules', 'chroma_add_monthly_cron_schedule' );
function chroma_add_monthly_cron_schedule( $schedules ) {

    if ( ! isset( $schedules['monthly'] ) ) {
        $schedules['monthly'] = [
            'interval' => 30 * DAY_IN_SECONDS,
            'display'  => __( 'Once Monthly', 'chroma' ),
        ];
    }

    return $schedules;
}


// ---------------------------------------------------------
// 2. SCHEDULE EVENT ON THEME ACTIVATE
// ---------------------------------------------------------

add_action( 'after_switch_theme', 'chroma_schedule_monthly_seo_cron' );
function chroma_schedule_monthly_seo_cron() {

    if ( ! wp_next_scheduled( 'chroma_monthly_seo_event' ) ) {
        // First run: now + 24 hours, then monthly
        wp_schedule_event(
            time() + DAY_IN_SECONDS,
            'monthly',
            'chroma_monthly_seo_event'
        );
    }
}


// ---------------------------------------------------------
// 3. UNSCHEDULE ON THEME DEACTIVATION (SAFETY)
// ---------------------------------------------------------

add_action( 'switch_theme', 'chroma_unschedule_monthly_seo_cron' );
function chroma_unschedule_monthly_seo_cron() {

    $timestamp = wp_next_scheduled( 'chroma_monthly_seo_event' );
    if ( $timestamp ) {
        wp_unschedule_event( $timestamp, 'chroma_monthly_seo_event' );
    }
}


// ---------------------------------------------------------
// 4. CRON CALLBACK: MONTHLY SEO MAINTENANCE
// ---------------------------------------------------------

add_action( 'chroma_monthly_seo_event', 'chroma_run_monthly_seo_tasks' );
function chroma_run_monthly_seo_tasks() {

    // Safety: bail if running in CLI or doing something unusual
    if ( defined( 'WP_CLI' ) && WP_CLI ) {
        return;
    }

    // 4.1 Example: log a note so you can verify it's running
    if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
        error_log( '[Chroma SEO Cron] Monthly SEO maintenance executed: ' . gmdate( 'c' ) );
    }

    // 4.2 Optional: ping search engines about updated sitemap
    chroma_ping_sitemaps_safe();

    // 4.3 Placeholder: place for future automated tasks (internal links, caching, etc.)
    // chroma_refresh_internal_link_cache();
    // chroma_recalculate_popular_posts();
}


// ---------------------------------------------------------
// 5. PING SEARCH ENGINES SAFELY
// ---------------------------------------------------------
/**
 * Notify search engines that sitemap.xml is available/updated.
 * This is OPTIONAL and conservative (only a couple of pings).
 */
function chroma_ping_sitemaps_safe() {

    $sitemap_url = home_url( '/sitemap.xml' );

    // Use wp_remote_get, but fail silently if anything goes wrong.

    // Google
    $google_ping = add_query_arg( 'sitemap', rawurlencode( $sitemap_url ), 'https://www.google.com/ping' );
    wp_remote_get( $google_ping, [
        'timeout' => 5,
        'blocking' => false,
    ]);

    // Bing (same endpoint now used for multiple engines via IndexNow, but we keep it basic)
    $bing_ping = add_query_arg( 'sitemap', rawurlencode( $sitemap_url ), 'https://www.bing.com/ping' );
    wp_remote_get( $bing_ping, [
        'timeout' => 5,
        'blocking' => false,
    ]);
}