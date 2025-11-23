<?php
/**
 * Fallback template.
 *
 * @package chroma
 */
get_header();
?>
<section class="content-area">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e('Content coming soon.', 'chroma'); ?></p>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
