<?php
/**
 * Archive view for Locations.
 *
 * @package Chroma
 */

global $wp_query;

$primary_cta   = chroma_get_option( 'locations_archive_primary_cta', site_url( '/contact/' ) );
$secondary_cta = chroma_get_option( 'locations_archive_secondary_cta', site_url( '/careers/' ) );
$eyebrow       = chroma_get_option( 'locations_archive_eyebrow', __( 'Locations', 'chroma' ) );
$title         = chroma_get_option( 'locations_archive_title', __( 'Neighborhood campuses designed for wonder.', 'chroma' ) );
$lede          = chroma_get_option( 'locations_archive_lede', __( 'Bright, secure schools throughout Metro Atlanta with playful learning environments, caring educators, and parent-loved amenities.', 'chroma' ) );

get_header();
?>

<section class="chroma-hero">
<div class="chroma-wrapper">
<div class="chroma-hero__eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
<h1 class="chroma-hero__title"><?php echo esc_html( $title ); ?></h1>
<p class="chroma-hero__lead"><?php echo esc_html( $lede ); ?></p>
<div class="chroma-cta-row">
<?php chroma_archive_cta( $primary_cta, __( 'Schedule a Visit', 'chroma' ) ); ?>
<?php chroma_archive_cta( $secondary_cta, __( 'Join our Team', 'chroma' ), 'ghost' ); ?>
</div>
</div>
</section>

<?php do_action( 'chroma_archive_before_loop' ); ?>

<section class="chroma-section">
<div class="chroma-wrapper">
<div class="chroma-section__header">
<h2 class="chroma-section__title"><?php esc_html_e( 'Find a Chroma campus', 'chroma' ); ?></h2>
<div class="chroma-pill-row">
<span class="chroma-pill"><?php echo esc_html( sprintf( _n( '%s location', '%s locations', $wp_query->found_posts, 'chroma' ), number_format_i18n( $wp_query->found_posts ) ) ); ?></span>
<span class="chroma-pill"><?php esc_html_e( 'Secure & bright classrooms', 'chroma' ); ?></span>
<span class="chroma-pill"><?php esc_html_e( 'Parent-loved amenities', 'chroma' ); ?></span>
</div>
</div>

<?php if ( have_posts() ) : ?>
<div class="chroma-grid">
<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/cards/content', 'location-card' );
endwhile;
?>
</div>
<?php else : ?>
<div class="chroma-empty">
<h3><?php esc_html_e( 'More campuses on the way', 'chroma' ); ?></h3>
<p><?php esc_html_e( 'We are actively expanding the Chroma family. Check back soon or connect with us to find the nearest opening campus.', 'chroma' ); ?></p>
</div>
<?php endif; ?>
</div>
</section>

<?php do_action( 'chroma_archive_after_loop' ); ?>

<?php get_footer(); ?>
