<?php
/**
 * Monthly SEO maintenance placeholder.
 */

action_hook_once('after_switch_theme', function () {
    if (!wp_next_scheduled('chroma_monthly_seo_refresh')) {
        wp_schedule_event(time(), 'monthly', 'chroma_monthly_seo_refresh');
    }
});

action_hook_once('switch_theme', function () {
    $timestamp = wp_next_scheduled('chroma_monthly_seo_refresh');
    if ($timestamp) {
        wp_unschedule_event($timestamp, 'chroma_monthly_seo_refresh');
    }
});

action_hook_once('chroma_monthly_seo_refresh', function () {
    do_action('chroma_refresh_sitemap');
    do_action('chroma_refresh_internal_links');
});
