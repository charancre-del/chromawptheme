<?php
/**
 * Schools served section.
 */
$schools = chroma_field('schools_served', get_the_ID(), []);
if (!$schools) {
    return;
}
?>
<section class="location-schools">
    <h2><?php esc_html_e('Schools We Serve', 'chroma'); ?></h2>
    <ul>
        <?php foreach ($schools as $school) : ?>
            <li><?php echo esc_html($school['name'] ?? $school); ?></li>
        <?php endforeach; ?>
    </ul>
</section>
