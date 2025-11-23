<?php
/**
 * Archive view for Programs.
 *
 * @package Chroma
 */

global $wp_query;

$primary_cta  = chroma_get_option( 'programs_archive_primary_cta', site_url( '/contact/' ) );
$secondary_cta = chroma_get_option( 'programs_archive_secondary_cta', site_url( '/programs/' ) );
$eyebrow      = chroma_get_option( 'programs_archive_eyebrow', __( 'Programs', 'chroma' ) );
$title        = chroma_get_option( 'programs_archive_title', __( 'Programs that grow with every milestone.', 'chroma' ) );
$lede         = chroma_get_option( 'programs_archive_lede', __( 'From infants to school-age, the Chroma Spectrum™ keeps curiosity alive with nurturing educators, vibrant classrooms, and research-backed experiences.', 'chroma' ) );

get_header();
?>

<section class="chroma-hero">
<div class="chroma-wrapper">
<div class="chroma-hero__eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
<h1 class="chroma-hero__title"><?php echo esc_html( $title ); ?></h1>
<p class="chroma-hero__lead"><?php echo esc_html( $lede ); ?></p>
<div class="chroma-cta-row">
<?php chroma_archive_cta( $primary_cta, __( 'Book a Tour', 'chroma' ) ); ?>
<?php chroma_archive_cta( $secondary_cta, __( 'View Curriculum', 'chroma' ), 'ghost' ); ?>
</div>
</div>
</section>

<?php do_action( 'chroma_archive_before_loop' ); ?>

<section class="chroma-section">
<div class="chroma-wrapper">
<div class="chroma-section__header">
<h2 class="chroma-section__title"><?php esc_html_e( 'Explore our classrooms', 'chroma' ); ?></h2>
<div class="chroma-pill-row">
<span class="chroma-pill"><?php echo esc_html( sprintf( _n( '%s program', '%s programs', $wp_query->found_posts, 'chroma' ), number_format_i18n( $wp_query->found_posts ) ) ); ?></span>
<span class="chroma-pill"><?php esc_html_e( 'Play-based learning', 'chroma' ); ?></span>
<span class="chroma-pill"><?php esc_html_e( 'GA Pre-K aligned', 'chroma' ); ?></span>
</div>
</div>

<?php if ( have_posts() ) : ?>
<div class="chroma-grid">
<?php
while ( have_posts() ) :
the_post();
get_template_part( 'template-parts/cards/content', 'program-card' );
endwhile;
?>
</div>
<?php else : ?>
<div class="chroma-empty">
<h3><?php esc_html_e( 'Programs launching soon', 'chroma' ); ?></h3>
<p><?php esc_html_e( 'We are curating classrooms and curriculum details. Check back shortly or connect with our team for the latest availability.', 'chroma' ); ?></p>
</div>
<?php endif; ?>
</div>
</section>

<?php do_action( 'chroma_archive_after_loop' ); ?>

<?php get_footer(); ?>
