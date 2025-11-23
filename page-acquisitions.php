<?php
/**
 * Acquisitions page template with plugin form and hooks.
 *
 * Template Name: Acquisitions Page
 *
 * @package chroma
 */

do_action('chroma_before_acquisitions');
get_header();
?>
<section class="acquisitions-page">
    <header class="section-header">
        <h1><?php the_title(); ?></h1>
    </header>
    <?php do_action('chroma_acquisitions_before_form'); ?>
    <div class="acquisitions-form">
        <?php echo do_shortcode('[chroma_acquisitions_form]'); ?>
    </div>
    <?php do_action('chroma_acquisitions_after_form'); ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</section>
<?php
get_footer();
do_action('chroma_after_acquisitions');
