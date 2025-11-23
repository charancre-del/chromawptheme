<?php
/**
 * Additional cleanup & hardening
 * Chroma Excellence Theme
 */

if ( ! defined( 'ABSPATH' ) ) exit;


// ---------------------------------------------------------
// DISABLE COMMENTS ON MEDIA & ATTACHMENT PAGES
// ---------------------------------------------------------

add_filter( 'comments_open', 'chroma_disable_comments_on_attachments', 10, 2 );
function chroma_disable_comments_on_attachments( $open, $post_id ) {
    $post = get_post( $post_id );
    if ( $post && $post->post_type === 'attachment' ) {
        return false;
    }
    return $open;
}


// ---------------------------------------------------------
// REDIRECT ATTACHMENT PAGES TO PARENT OR HOME
// ---------------------------------------------------------

add_action( 'template_redirect', 'chroma_redirect_attachment_pages' );
function chroma_redirect_attachment_pages() {
    if ( is_attachment() ) {
        global $post;
        if ( $post && $post->post_parent ) {
            wp_safe_redirect( get_permalink( $post->post_parent ), 301 );
        } else {
            wp_safe_redirect( home_url( '/' ), 301 );
        }
        exit;
    }
}


// ---------------------------------------------------------
// DISABLE AUTHOR ARCHIVES (YOU DON'T NEED THEM FOR CHROMA)
// ---------------------------------------------------------

add_action( 'template_redirect', 'chroma_disable_author_archives' );
function chroma_disable_author_archives() {
    if ( is_author() ) {
        wp_safe_redirect( home_url( '/' ), 301 );
        exit;
    }
}


// ---------------------------------------------------------
// REMOVE WORDPRESS VERSION FROM SCRIPTS & STYLES
// ---------------------------------------------------------

add_filter( 'style_loader_src', 'chroma_remove_version_from_assets', 9999 );
add_filter( 'script_loader_src', 'chroma_remove_version_from_assets', 9999 );
function chroma_remove_version_from_assets( $src ) {
    if ( strpos( $src, 'ver=' ) !== false ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}


// ---------------------------------------------------------
// DISABLE XML-RPC PINGBACKS
// ---------------------------------------------------------

add_filter( 'xmlrpc_methods', 'chroma_disable_xmlrpc_pingbacks' );
function chroma_disable_xmlrpc_pingbacks( $methods ) {
    if ( isset( $methods['pingback.ping'] ) ) {
        unset( $methods['pingback.ping'] );
    }
    return $methods;
}