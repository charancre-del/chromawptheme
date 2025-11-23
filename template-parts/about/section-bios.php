<?php
/**
 * Bios repeater section.
 */
$bios = get_field('team_bios');
if (!$bios) {
    return;
}
?>
<section class="about-bios">
    <h2><?php esc_html_e('Meet the Team', 'chroma'); ?></h2>
    <div class="bios-grid">
        <?php foreach ($bios as $bio) : ?>
            <article class="bio-card">
                <h3><?php echo esc_html($bio['name'] ?? ''); ?></h3>
                <?php if (!empty($bio['role'])) : ?>
                    <p class="bio-role"><?php echo esc_html($bio['role']); ?></p>
                <?php endif; ?>
                <div class="bio-text"><?php echo wp_kses_post($bio['bio'] ?? ''); ?></div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
