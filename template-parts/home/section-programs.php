<?php
/**
 * Programs grid section.
 */
$program_query = new WP_Query([
    'post_type' => 'program',
    'posts_per_page' => -1,
    'orderby' => 'menu_order title',
]);
?>
<section class="home-programs">
    <div class="container">
        <div class="programs-grid">
            <?php if ($program_query->have_posts()) : while ($program_query->have_posts()) : $program_query->the_post(); ?>
                <?php get_template_part('template-parts/programs/card', 'program'); ?>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>
