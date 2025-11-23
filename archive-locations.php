<?php
/**
 * Locations archive.
 *
 * @package chroma
 */

get_header();
?>
<section class="locations-archive">
    <header class="section-header">
        <h1><?php post_type_archive_title(); ?></h1>
    </header>
    <div class="locations-grid">
        <?php
        $query = new WP_Query(chroma_location_query_args());
        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
                get_template_part('template-parts/locations/card', 'location');
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>
