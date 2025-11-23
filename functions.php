<?php
/**
 * Core helpers for the Chroma theme.
 */

if ( ! function_exists( 'chroma_get_option' ) ) {
  /**
   * Fetch an option from the database or theme mods with a fallback.
   *
   * @param string $key     Option key.
   * @param mixed  $default Default value if nothing is stored.
   *
   * @return mixed
   */
  function chroma_get_option( $key, $default = '' ) {
    $value = get_option( $key );

    if ( ! empty( $value ) ) {
      return $value;
    }

    $mod = get_theme_mod( $key );

    if ( ! empty( $mod ) ) {
      return $mod;
    }

    return $default;
  }
}

if ( ! function_exists( 'chroma_archive_cta' ) ) {
  /**
   * Render a CTA button when a URL is provided.
   *
   * @param string $url     Destination URL.
   * @param string $label   Anchor text.
   * @param string $variant Visual treatment.
   */
  function chroma_archive_cta( $url, $label, $variant = 'primary' ) {
    if ( empty( $url ) ) {
      return;
    }

    $classes = 'chroma-button chroma-button--' . ( 'ghost' === $variant ? 'ghost' : 'primary' );
    echo '<a class="' . esc_attr( $classes ) . '" href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
  }
}
