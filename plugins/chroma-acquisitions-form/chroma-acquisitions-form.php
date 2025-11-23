<?php
/**
 * Plugin Name: Chroma Acquisitions Form
 * Description: Provides shortcode for acquisitions intake form with spam protection and LeadConnector webhook placeholder.
 * Version: 0.1.0
 * Author: Project Team
 */

add_shortcode('chroma_acquisitions_form', function ($atts = []) {
    $action = esc_url(admin_url('admin-post.php'));
    ob_start();
    ?>
    <form method="post" action="<?php echo $action; ?>" class="chroma-acquisitions-form">
        <input type="hidden" name="action" value="chroma_acquisitions_form_submit" />
        <?php wp_nonce_field('chroma_acquisitions_form'); ?>
        <label>
            <?php esc_html_e('Your Name', 'chroma'); ?>
            <input type="text" name="owner_name" required />
        </label>
        <label>
            <?php esc_html_e('School Name', 'chroma'); ?>
            <input type="text" name="school_name" required />
        </label>
        <label>
            <?php esc_html_e('Email', 'chroma'); ?>
            <input type="email" name="owner_email" required />
        </label>
        <label class="chroma-honeypot" style="display:none;">
            <?php esc_html_e('Leave this field empty', 'chroma'); ?>
            <input type="text" name="chroma_hp" />
        </label>
        <button type="submit" data-event="chroma_cta_click"><?php esc_html_e('Submit Inquiry', 'chroma'); ?></button>
    </form>
    <?php
    return ob_get_clean();
});

add_action('admin_post_nopriv_chroma_acquisitions_form_submit', 'chroma_handle_acquisitions_form');
add_action('admin_post_chroma_acquisitions_form_submit', 'chroma_handle_acquisitions_form');

function chroma_handle_acquisitions_form(): void
{
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'chroma_acquisitions_form')) {
        wp_die(__('Security check failed', 'chroma'));
    }
    if (!empty($_POST['chroma_hp'])) {
        wp_safe_redirect(wp_get_referer());
        exit;
    }

    $payload = [
        'owner_name' => sanitize_text_field($_POST['owner_name'] ?? ''),
        'school_name' => sanitize_text_field($_POST['school_name'] ?? ''),
        'owner_email' => sanitize_email($_POST['owner_email'] ?? ''),
        'source' => 'acquisitions_form',
    ];

    wp_mail(get_option('admin_email'), __('New Acquisition Inquiry', 'chroma'), print_r($payload, true));
    do_action('chroma_leadconnector_webhook', $payload);

    wp_safe_redirect(add_query_arg('acquisition_submitted', '1', wp_get_referer() ?: home_url('/')));
    exit;
}
