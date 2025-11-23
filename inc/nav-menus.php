<?php
/**
 * Navigation helpers
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * PRIMARY NAV
 *
 * Usage in header.php:
 * <?php chroma_primary_nav(); ?>
 */
function chroma_primary_nav() {

    if ( ! has_nav_menu( 'primary' ) ) {
        return;
    }

    wp_nav_menu([
        'theme_location'  => 'primary',
        'container'       => 'nav',
        'container_class' => 'hidden md:flex items-center gap-6',
        'menu_class'      => 'flex items-center gap-6',
        'fallback_cb'     => false,
        'depth'           => 2,
    ]);
}

/**
 * FOOTER NAV
 *
 * Usage in footer.php:
 * <?php chroma_footer_nav(); ?>
 */
function chroma_footer_nav() {

    if ( ! has_nav_menu( 'footer' ) ) {
        return;
    }

    wp_nav_menu([
        'theme_location'  => 'footer',
        'container'       => 'nav',
        'container_class' => 'mt-4',
        'menu_class'      => 'flex flex-wrap gap-3 text-sm text-slate-400',
        'fallback_cb'     => false,
        'depth'           => 1,
    ]);
}

/**
 * TOP/UTILITY NAV (optional)
 *
 * Usage (if you decide to use it in header):
 * <?php chroma_top_nav(); ?>
 */
function chroma_top_nav() {

    if ( ! has_nav_menu( 'topmenu' ) ) {
        return;
    }

    wp_nav_menu([
        'theme_location'  => 'topmenu',
        'container'       => 'nav',
        'container_class' => 'hidden lg:flex items-center gap-4 text-xs text-slate-500',
        'menu_class'      => 'flex items-center gap-4',
        'fallback_cb'     => false,
        'depth'           => 1,
    ]);
}


// ---------------------------------------------------------
// ADD TAILWIND CLASSES TO NAV <LI> + <A> ITEMS
// ---------------------------------------------------------

/**
 * Add custom classes to <li> elements in nav menus
 */
add_filter( 'nav_menu_css_class', 'chroma_nav_menu_css_class', 10, 4 );
function chroma_nav_menu_css_class( $classes, $item, $args, $depth ) {

    // Primary menu
    if ( isset( $args->theme_location ) && $args->theme_location === 'primary' ) {
        $classes[] = 'relative';
    }

    // Footer menu
    if ( isset( $args->theme_location ) && $args->theme_location === 'footer' ) {
        $classes[] = 'inline-flex';
    }

    return $classes;
}


/**
 * Add custom classes to <a> elements in nav menus
 */
add_filter( 'nav_menu_link_attributes', 'chroma_nav_menu_link_attributes', 10, 4 );
function chroma_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

    $classes = '';

    if ( isset( $args->theme_location ) && $args->theme_location === 'primary' ) {
        $classes = 'text-sm font-medium text-slate-700 hover:text-brand-navy transition';
        if ( in_array( 'current-menu-item', (array) $item->classes, true ) ) {
            $classes .= ' text-brand-navy';
        }
    }

    if ( isset( $args->theme_location ) && $args->theme_location === 'footer' ) {
        $classes = 'hover:text-white transition';
    }

    if ( isset( $args->theme_location ) && $args->theme_location === 'topmenu' ) {
        $classes = 'hover:text-brand-navy transition';
    }

    if ( ! empty( $classes ) ) {
        $existing = isset( $atts['class'] ) ? $atts['class'] . ' ' : '';
        $atts['class'] = $existing . $classes;
    }

    return $atts;
}