<?php
/**
 * Archive view for Stories.
 *
 * @package Chroma
 */

global $wp_query;

$primary_cta   = chroma_get_option( 'stories_archive_primary_cta', site_url( '/contact/' ) );
$secondary_cta = chroma_get_option( 'stories_archive_secondary_cta', site_url( '/programs/' ) );
$eyebrow       = chroma_get_option( 'stories_archive_eyebrow', __( 'Stories', 'chroma' ) );
$title         = chroma_get_option( 'stories_archive_title', __( 'Inside the Chroma experience.', 'chroma' ) );
$lede          = chroma_get_option( 'stories_archive_lede', __( 'Parent spotlights, classroom moments, and community news that capture the PrismPath spirit.', 'chroma' ) );

get_header();
?>

<section class="chroma-hero">
<div class="chroma-wrapper">
<div class="chroma-hero__eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
<h1 class="chroma-hero__title"><?php echo esc_html( $title ); ?></h1>
<p class="chroma-hero__lead"><?php echo esc_html( $lede ); ?></p>
<div class="chroma-cta-row">
<?php chroma_archive_cta( $primary_cta, __( 'Talk with Admissions', 'chroma' ) ); ?>
<?php chroma_archive_cta( $secondary_cta, __( 'Explore Programs', 'chroma' ), 'ghost' ); ?>
</div>
</div>
</section>

<?php do_action( 'chroma_archive_before_loop' ); ?>

<section class="chroma-section">
<div class="chroma-wrapper">
<div class="chroma-section__header">
<h2 class="chroma-section__title"><?php esc_html_e( 'Latest stories', 'chroma' ); ?></h2>
<div class="chroma-pill-row">
<span class="chroma-pill"><?php echo esc_html( sprintf( _n( '%s story', '%s stories', $wp_query->found_posts, 'chroma' ), number_format_i18n( $wp_query->found_posts ) ) ); ?></span>
<span class="chroma-pill"><?php esc_html_e( 'Parent voices', 'chroma' ); ?></span>
<span class="chroma-pill"><?php esc_html_e( 'Daily joy & discoveries', 'chroma' ); ?></span>
</div>
</div>

<?php if ( have_posts() ) : ?>
<div class="chroma-grid">
<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/cards/content', 'story-card' );
endwhile;
?>
</div>
<?php else : ?>
<div class="chroma-empty">
<h3><?php esc_html_e( 'Stories coming soon', 'chroma' ); ?></h3>
<p><?php esc_html_e( 'We are gathering fresh stories from classrooms and families. Check back shortly or subscribe for updates.', 'chroma' ); ?></p>
</div>
<?php endif; ?>
</div>
</section>

<?php do_action( 'chroma_archive_after_loop' ); ?>

<?php get_footer(); ?>
