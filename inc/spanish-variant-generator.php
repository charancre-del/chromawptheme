<?php
/**
 * Spanish/English Variant Helpers
 * Chroma Excellence Theme
 *
 * This file reuses the same ACF fields that seo-engine.php expects:
 *  - alternate_url_en
 *  - alternate_url_es
 *
 * It does NOT auto-create pages or change URLs.
 * It ONLY helps you:
 *  - Understand the current language
 *  - Get the opposite-language URL
 *  - Render a language switch UI.
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Returns an array describing the language pair for the current post/page.
 *
 * Structure:
 * [
 *   'current_lang'   => 'en' | 'es' | 'unknown',
 *   'current_url'    => 'https://...',
 *   'alternate_lang' => 'es' | 'en' | null,
 *   'alternate_url'  => 'https://...' | null,
 * ]
 *
 * Uses:
 *  - ACF fields alternate_url_en / alternate_url_es
 *  - If they are missing, falls back to guessing off current URL.
 *
 * @param int|null $post_id
 * @return array
 */
function chroma_get_language_pair( $post_id = null ) {

    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $result = [
        'current_lang'   => 'unknown',
        'current_url'    => '',
        'alternate_lang' => null,
        'alternate_url'  => null,
    ];

    if ( ! $post_id ) {
        return $result;
    }

    $current_url = get_permalink( $post_id );
    $result['current_url'] = $current_url;

    // If ACF isn't available, we can't do much more
    if ( ! function_exists( 'get_field' ) ) {
        return $result;
    }

    $alt_en = get_post_meta( $post_id, 'alternate_url_en', true );
    $alt_es = get_post_meta( $post_id, 'alternate_url_es', true );

    // Normalize empty strings to null
    $alt_en = $alt_en ? esc_url_raw( $alt_en ) : null;
    $alt_es = $alt_es ? esc_url_raw( $alt_es ) : null;

    // Try to detect which one matches the current URL
    if ( $alt_en && $current_url === $alt_en ) {
        $result['current_lang']   = 'en';
        $result['alternate_lang'] = $alt_es ? 'es' : null;
        $result['alternate_url']  = $alt_es;
        return $result;
    }

    if ( $alt_es && $current_url === $alt_es ) {
        $result['current_lang']   = 'es';
        $result['alternate_lang'] = $alt_en ? 'en' : null;
        $result['alternate_url']  = $alt_en;
        return $result;
    }

    // If current URL isn't explicitly one of the stored alternates:
    // Heuristic: If we have both alt_en and alt_es, assume current is EN if it's closer to alt_en.
    if ( $alt_en && $alt_es ) {
        // Simple heuristic: does current URL contain "/es/"?
        if ( strpos( $current_url, '/es/' ) !== false ) {
            $result['current_lang']   = 'es';
            $result['alternate_lang'] = 'en';
            $result['alternate_url']  = $alt_en;
        } else {
            $result['current_lang']   = 'en';
            $result['alternate_lang'] = 'es';
            $result['alternate_url']  = $alt_es;
        }
    } elseif ( $alt_en && ! $alt_es ) {
        // We only know English URL
        $result['current_lang'] = 'en';
    } elseif ( $alt_es && ! $alt_en ) {
        // We only know Spanish URL
        $result['current_lang'] = 'es';
    }

    return $result;
}


/**
 * Render a small language switch pill (if an alternate exists).
 *
 * Usage (e.g. in header.php or single templates):
 *
 *   <?php chroma_render_language_switcher(); ?>
 */
function chroma_render_language_switcher() {

    if ( ! is_singular() ) {
        return;
    }

    $pair = chroma_get_language_pair();

    if ( empty( $pair['alternate_url'] ) || ! $pair['alternate_lang'] ) {
        return; // nothing to switch to
    }

    $current_lang   = $pair['current_lang'];
    $alternate_lang = $pair['alternate_lang'];
    $alternate_url  = $pair['alternate_url'];

    // Labels
    $label_current   = $current_lang === 'es' ? 'ES' : 'EN';
    $label_alternate = $alternate_lang === 'es' ? 'ES' : 'EN';

    // Optional: full language names for screen readers
    $full_current   = $current_lang === 'es' ? 'Español' : 'English';
    $full_alternate = $alternate_lang === 'es' ? 'Español' : 'English';

    ?>
    <div class="inline-flex items-center rounded-full bg-brand-cream px-1 py-1 text-xs font-medium text-brand-navy">
        <span class="px-2 py-0.5 rounded-full bg-brand-navy text-white">
            <?php echo esc_html( $label_current ); ?>
            <span class="sr-only">(<?php echo esc_html( $full_current ); ?>)</span>
        </span>
        <a href="<?php echo esc_url( $alternate_url ); ?>"
           class="ml-1 px-2 py-0.5 rounded-full hover:bg-white transition">
            <?php echo esc_html( $label_alternate ); ?>
            <span class="sr-only">(<?php echo esc_html( $full_alternate ); ?>)</span>
        </a>
    </div>
    <?php
}