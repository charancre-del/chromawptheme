<?php
/**
 * Single Location template.
 *
 * @package chroma
 */

do_action('chroma_before_location');
get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('location-single'); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php get_template_part('template-parts/locations/section', 'schools'); ?>
        <?php get_template_part('template-parts/locations/section', 'programs'); ?>
    </div>
</article>
<?php
get_footer();
do_action('chroma_after_location');
