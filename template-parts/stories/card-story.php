<?php
/**
 * Story card component.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('story-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="story-card__media">
            <?php the_post_thumbnail('chroma-card', ['loading' => 'lazy']); ?>
        </div>
    <?php endif; ?>
    <div class="story-card__content">
        <?php the_title('<h2 class="story-card__title">', '</h2>'); ?>
        <div class="story-card__excerpt"><?php the_excerpt(); ?></div>
        <div class="story-card__cta">
            <?php echo chroma_cta(__('Read Story', 'chroma'), get_permalink()); ?>
        </div>
    </div>
</article>
