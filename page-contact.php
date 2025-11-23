<?php
/**
 * Contact page template.
 *
 * Template Name: Contact Page
 *
 * @package chroma
 */

get_header();
?>
<section class="contact-page">
    <header class="section-header">
        <h1><?php the_title(); ?></h1>
    </header>
    <div class="contact-form">
        <?php the_content(); ?>
    </div>
</section>
<?php get_footer(); ?>
