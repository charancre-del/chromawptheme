<?php
/**
 * Hero section.
 */
$title = get_sub_field('heading');
$cta   = get_sub_field('primary_cta');
$form_shortcode = get_sub_field('form_shortcode') ?: '[chroma_tour_form]';
?>
<section class="home-hero">
    <div class="container">
        <?php if ($title) : ?>
            <h1><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
        <?php if ($cta && isset($cta['url'], $cta['title'])) : ?>
            <?php echo chroma_cta($cta['title'], $cta['url']); ?>
        <?php endif; ?>
        <div class="hero-form">
            <?php echo do_shortcode($form_shortcode); ?>
        </div>
    </div>
</section>
