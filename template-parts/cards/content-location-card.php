<?php
/**
 * Location card partial.
 *
 * @package Chroma
 */

$cta_label = chroma_get_option( 'location_card_cta_label', __( 'Schedule a tour', 'chroma' ) );
$city      = get_post_meta( get_the_ID(), 'location_city', true );
$state     = get_post_meta( get_the_ID(), 'location_state', true );
$address   = get_post_meta( get_the_ID(), 'location_address', true );
?>

<article class="chroma-card">
<?php if ( has_post_thumbnail() ) : ?>
<div class="chroma-card__media">
<a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
<?php the_post_thumbnail( 'large' ); ?>
</a>
</div>
<?php endif; ?>

<div class="chroma-card__body">
<div class="chroma-card__eyebrow"><?php esc_html_e( 'Neighborhood campus', 'chroma' ); ?></div>
<h3 class="chroma-card__title"><a class="chroma-card__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<p class="chroma-card__excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20, '&hellip;' ) ); ?></p>

<?php if ( $city || $state || $address ) : ?>
<div class="chroma-pill-row">
<?php if ( $city || $state ) : ?>
<span class="chroma-pill"><?php echo esc_html( trim( $city . ' ' . $state ) ); ?></span>
<?php endif; ?>
<?php if ( $address ) : ?>
<span class="chroma-pill"><?php echo esc_html( $address ); ?></span>
<?php endif; ?>
</div>
<?php endif; ?>

<div class="chroma-card__meta">
<span><?php echo esc_html( __( 'Tours available', 'chroma' ) ); ?></span>
<a class="chroma-card__link" href="<?php the_permalink(); ?>"><?php echo esc_html( $cta_label ); ?></a>
</div>
</div>
</article>
