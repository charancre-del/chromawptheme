<?php
/**
 * Theme setup and enqueue hooks.
 */

if ( ! defined( 'CHROMA_THEME_VERSION' ) ) {
  define( 'CHROMA_THEME_VERSION', wp_get_theme()->get( 'Version' ) ?: '1.0.0' );
}

add_action( 'after_setup_theme', function() {
  add_theme_support( 'title-tag' );
} );

require get_template_directory() . '/inc/enqueue.php';
