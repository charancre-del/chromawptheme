<?php
/**
 * Asset loading.
 */

function chroma_enqueue_assets() {
  $theme_uri = get_template_directory_uri();

  // Fonts & icons
  wp_enqueue_style(
    'chroma-fonts',
    'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap',
    [],
    null
  );

  // Compiled styles
  $css_path = get_template_directory() . '/dist/main.css';
  wp_enqueue_style(
    'chroma-main',
    $theme_uri . '/dist/main.css',
    [],
    file_exists( $css_path ) ? filemtime( $css_path ) : CHROMA_THEME_VERSION
  );

  // External libraries
  wp_enqueue_script( 'chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', [], null, true );

  // Theme scripts
  $js_path = get_template_directory() . '/dist/main.js';
  wp_enqueue_script(
    'chroma-main',
    $theme_uri . '/dist/main.js',
    [ 'chartjs' ],
    file_exists( $js_path ) ? filemtime( $js_path ) : CHROMA_THEME_VERSION,
    true
  );
}
add_action( 'wp_enqueue_scripts', 'chroma_enqueue_assets' );
