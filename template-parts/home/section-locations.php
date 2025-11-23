<?php
/**
 * Locations strip auto-query.
 */
$args = chroma_location_query_args([
    'posts_per_page' => get_sub_field('max_locations') ?: -1,
]);
$query = new WP_Query($args);
?>
<section class="home-locations">
    <div class="container">
        <div class="locations-grid">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part('template-parts/locations/card', 'location'); ?>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>
