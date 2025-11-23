<?php
/**
 * Program card partial.
 *
 * @package Chroma
 */

$terms = [];
$taxes = array_filter( get_object_taxonomies( get_post_type(), 'names' ), static function ( $taxonomy ) {
return 'post_format' !== $taxonomy;
} );

foreach ( $taxes as $taxonomy ) {
$term_items = get_the_terms( get_the_ID(), $taxonomy );

if ( $term_items && ! is_wp_error( $term_items ) ) {
$terms = array_merge( $terms, $term_items );
}
}

$term_names       = array_unique( wp_list_pluck( $terms, 'name' ) );
$post_type_object = get_post_type_object( get_post_type() );
$eyebrow          = $post_type_object ? $post_type_object->labels->singular_name : get_post_type();
$cta_label  = chroma_get_option( 'program_card_cta_label', __( 'Explore program', 'chroma' ) );
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
<div class="chroma-card__eyebrow"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></div>
<h3 class="chroma-card__title"><a class="chroma-card__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<p class="chroma-card__excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 22, '&hellip;' ) ); ?></p>

<?php if ( $term_names ) : ?>
<div class="chroma-pill-row">
<?php foreach ( $term_names as $term_name ) : ?>
<span class="chroma-pill"><?php echo esc_html( $term_name ); ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>

<div class="chroma-card__meta">
<span><?php echo esc_html( get_the_modified_date() ); ?></span>
<a class="chroma-card__link" href="<?php the_permalink(); ?>"><?php echo esc_html( $cta_label ); ?></a>
</div>
</div>
</article>
