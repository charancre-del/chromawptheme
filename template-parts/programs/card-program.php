<?php
/**
 * Program card component.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('program-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="program-card__media">
            <?php the_post_thumbnail('chroma-card', ['loading' => 'lazy']); ?>
        </div>
    <?php endif; ?>
    <div class="program-card__content">
        <?php the_title('<h2 class="program-card__title">', '</h2>'); ?>
        <div class="program-card__excerpt"><?php the_excerpt(); ?></div>
        <div class="program-card__cta">
            <?php echo chroma_cta(__('View Program', 'chroma'), get_permalink()); ?>
        </div>
    </div>
</article>
