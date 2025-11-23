<?php
/**
 * Parents page template with hooks and buttons shortcode.
 *
 * Template Name: Parents Page
 *
 * @package chroma
 */

do_action('chroma_before_parents');
get_header();
?>
<section class="parents-page">
    <header class="section-header">
        <h1><?php the_title(); ?></h1>
    </header>
    <?php do_action('chroma_parents_before_buttons'); ?>
    <div class="parents-buttons">
        <?php echo do_shortcode('[chroma_parents_forms]'); ?>
    </div>
    <?php do_action('chroma_parents_after_buttons'); ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</section>
<?php
get_footer();
do_action('chroma_after_parents');
