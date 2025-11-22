<?php
/**
 * About page template with bios.
 *
 * Template Name: About Page
 *
 * @package chroma
 */

get_header();
?>
<section class="about-page">
    <header class="section-header">
        <h1><?php the_title(); ?></h1>
    </header>
    <div class="about-bios">
        <?php get_template_part('template-parts/about/section', 'bios'); ?>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</section>
<?php get_footer(); ?>
