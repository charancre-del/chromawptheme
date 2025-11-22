<?php
/**
 * Hreflang and Spanish variant helpers.
 */

action_hook_once('wp_head', function () {
    if (is_singular()) {
        $spanish_url = get_post_meta(get_the_ID(), 'spanish_variant_url', true);
        if ($spanish_url) {
            echo '<link rel="alternate" hreflang="es" href="' . esc_url($spanish_url) . '" />';
        }
    }
});
