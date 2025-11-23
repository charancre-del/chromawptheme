<?php
/**
 * Story card partial.
 *
 * @package Chroma
 */

$cta_label = chroma_get_option( 'story_card_cta_label', __( 'Read story', 'chroma' ) );
$categories = get_the_category();
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
<div class="chroma-card__eyebrow"><?php esc_html_e( 'Chroma Story', 'chroma' ); ?></div>
<h3 class="chroma-card__title"><a class="chroma-card__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<p class="chroma-card__excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 24, '&hellip;' ) ); ?></p>

<?php if ( $categories ) : ?>
<div class="chroma-pill-row">
<?php foreach ( $categories as $category ) : ?>
<span class="chroma-pill"><?php echo esc_html( $category->name ); ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>

<div class="chroma-card__meta">
<span><?php echo esc_html( get_the_date() ); ?></span>
<a class="chroma-card__link" href="<?php the_permalink(); ?>"><?php echo esc_html( $cta_label ); ?></a>
</div>
</div>
</article>
