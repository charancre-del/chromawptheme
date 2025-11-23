<?php
/**
 * Programs archive.
 *
 * @package chroma
 */

get_header();
do_action('chroma_before_programs_archive');
?>
<section class="programs-archive">
    <header class="section-header">
        <h1><?php post_type_archive_title(); ?></h1>
    </header>
    <div class="programs-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/programs/card', 'program'); ?>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php
do_action('chroma_after_programs_archive');
get_footer();
