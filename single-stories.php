<?php
/**
 * Single Story template.
 *
 * @package chroma
 */

get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('story-single'); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <div class="entry-meta">
        <span class="entry-date"><?php echo esc_html(get_the_date()); ?></span>
        <span class="entry-terms"><?php the_terms(get_the_ID(), 'category'); ?></span>
    </div>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>
<?php get_footer(); ?>
