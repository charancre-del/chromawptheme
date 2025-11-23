<?php
/**
 * Location card component.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('location-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="location-card__media">
            <?php the_post_thumbnail('chroma-card', ['loading' => 'lazy']); ?>
        </div>
    <?php endif; ?>
    <div class="location-card__content">
        <?php the_title('<h3 class="location-card__title">', '</h3>'); ?>
        <div class="location-card__excerpt"><?php the_excerpt(); ?></div>
        <div class="location-card__cta">
            <?php echo chroma_cta(sprintf(__('Book a Tour in %s', 'chroma'), get_the_title()), get_permalink()); ?>
        </div>
    </div>
</article>
