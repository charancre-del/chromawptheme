<?php
/**
 * Asset enqueues.
 */

action_hook_once('wp_enqueue_scripts', function () {
    $style_path = CHROMA_THEME_PATH . '/dist/main.css';
    $style_uri  = CHROMA_THEME_URI . '/dist/main.css';
    $version    = file_exists($style_path) ? filemtime($style_path) : CHROMA_THEME_VERSION;

    wp_enqueue_style('chroma-style', $style_uri, [], $version);

    $main_js_path = CHROMA_THEME_PATH . '/assets/js/main.js';
    $map_js_path  = CHROMA_THEME_PATH . '/assets/js/map-layer.js';
    wp_enqueue_script('chroma-main', CHROMA_THEME_URI . '/assets/js/main.js', ['jquery'], file_exists($main_js_path) ? filemtime($main_js_path) : CHROMA_THEME_VERSION, true);
    wp_enqueue_script('chroma-map', CHROMA_THEME_URI . '/assets/js/map-layer.js', ['chroma-main'], file_exists($map_js_path) ? filemtime($map_js_path) : CHROMA_THEME_VERSION, true);

    wp_localize_script('chroma-main', 'chromaTheme', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'restUrl' => esc_url_raw(get_rest_url()),
        'tracking' => [
            'formEvent' => 'chroma_form_submit',
            'ctaEvent' => 'chroma_cta_click',
            'hookEvent' => 'chroma_hook_trigger',
        ],
    ]);
});
