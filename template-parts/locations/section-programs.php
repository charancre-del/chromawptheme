<?php
/**
 * Programs offered at this location.
 */
$programs = chroma_field('programs_offered', get_the_ID(), []);
if (!$programs) {
    return;
}
?>
<section class="location-programs">
    <h2><?php esc_html_e('Programs at this Location', 'chroma'); ?></h2>
    <ul>
        <?php foreach ($programs as $program) : ?>
            <li>
                <a href="<?php echo esc_url(get_permalink($program)); ?>" data-event="chroma_hook_trigger">
                    <?php echo esc_html(get_the_title($program)); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
