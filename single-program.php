<?php
/**
 * Single Program template.
 *
 * @package chroma
 */

do_action('chroma_before_program');
get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('program-single'); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</article>
<?php
get_footer();
do_action('chroma_after_program');
