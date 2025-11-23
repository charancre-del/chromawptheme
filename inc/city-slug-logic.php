<?php
/**
 * Generate location slugs following service-area-city-state pattern.
 */

action_hook_once('save_post_location', function ($post_id, $post, $update) {
    if (wp_is_post_revision($post_id) || defined('DOING_AUTOSAVE')) {
        return;
    }
    $city  = get_field('address_city', $post_id) ?: get_post_meta($post_id, 'address_city', true);
    $state = get_field('address_state', $post_id) ?: get_post_meta($post_id, 'address_state', true);
    if (!$city || !$state) {
        return;
    }
    $slug = 'service-areas-' . sanitize_title($city . '-' . $state);
    remove_action('save_post_location', __FUNCTION__, 10);
    wp_update_post([
        'ID' => $post_id,
        'post_name' => $slug,
    ]);
    add_action('save_post_location', __FUNCTION__, 10, 3);
}, 10, 3);
