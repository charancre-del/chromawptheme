<?php
/**
 * Stories archive (blog index).
 *
 * @package chroma
 */

get_header();
?>
<section class="stories-archive">
    <header class="section-header">
        <h1><?php post_type_archive_title(); ?></h1>
    </header>
    <div class="stories-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/stories/card', 'story'); ?>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
