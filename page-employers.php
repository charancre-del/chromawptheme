<?php
/**
 * Employers page template.
 *
 * Template Name: Employers Page
 *
 * @package chroma
 */

get_header();
?>
<section class="employers-page">
    <header class="section-header">
        <h1><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</section>
<?php get_footer(); ?>
