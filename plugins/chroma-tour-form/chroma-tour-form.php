<?php
/**
 * Plugin Name: Chroma Tour Form
 * Description: Provides shortcode for the homepage tour form with spam protection and LeadConnector webhook placeholder.
 * Version: 0.1.0
 * Author: Project Team
 */

add_shortcode('chroma_tour_form', function ($atts = []) {
    $atts = shortcode_atts([
        'class' => 'space-y-4',
    ], $atts, 'chroma_tour_form');

    $action     = esc_url(admin_url('admin-post.php'));
    $locations  = get_posts([
        'post_type' => 'location',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'fields' => 'ids',
    ]);

    ob_start();
    ?>
    <form method="post" action="<?php echo $action; ?>" class="<?php echo esc_attr($atts['class']); ?>" data-event="chroma_cta_click">
        <input type="hidden" name="action" value="chroma_tour_form_submit" />
        <?php wp_nonce_field('chroma_tour_form'); ?>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5"><?php esc_html_e('Parent Name', 'chroma'); ?></label>
                <input type="text" name="parent_name" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="<?php esc_attr_e('Jane Doe', 'chroma'); ?>" />
            </div>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5"><?php esc_html_e('Phone', 'chroma'); ?></label>
                <input type="tel" name="parent_phone" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="<?php esc_attr_e('(555) 123-4567', 'chroma'); ?>" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5"><?php esc_html_e('Email', 'chroma'); ?></label>
                <input type="email" name="parent_email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="<?php esc_attr_e('you@email.com', 'chroma'); ?>" />
            </div>
            <div>
                <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5"><?php esc_html_e('Preferred Campus', 'chroma'); ?></label>
                <select name="preferred_campus" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:border-brand-navy outline-none text-sm">
                    <option value=""><?php esc_html_e('Select a location…', 'chroma'); ?></option>
                    <?php foreach ($locations as $location_id) : ?>
                        <option value="<?php echo esc_attr(get_the_title($location_id)); ?>"><?php echo esc_html(get_the_title($location_id)); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div>
            <label class="block text-[11px] font-semibold text-slate-500 uppercase mb-1.5"><?php esc_html_e('Child(ren) Age(s)', 'chroma'); ?></label>
            <input type="text" name="child_ages" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:border-brand-navy outline-none text-sm" placeholder="<?php esc_attr_e('e.g., 10 months, 3 years', 'chroma'); ?>" />
        </div>
        <label class="chroma-honeypot" style="display:none;">
            <?php esc_html_e('Leave this field empty', 'chroma'); ?>
            <input type="text" name="chroma_hp" />
        </label>
        <button type="submit" class="w-full mt-2 inline-flex items-center justify-center bg-brand-navy text-white text-xs font-semibold tracking-[0.24em] uppercase py-3.5 rounded-full shadow-soft hover:bg-slate-900">
            <?php esc_html_e('Request Tour Times', 'chroma'); ?>
        </button>
        <p class="text-[11px] text-slate-400 mt-2">
            <?php esc_html_e('No obligation. We’ll never share your information.', 'chroma'); ?>
        </p>
    </form>
    <?php
    return ob_get_clean();
});

add_action('admin_post_nopriv_chroma_tour_form_submit', 'chroma_handle_tour_form');
add_action('admin_post_chroma_tour_form_submit', 'chroma_handle_tour_form');

function chroma_handle_tour_form(): void
{
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'chroma_tour_form')) {
        wp_die(__('Security check failed', 'chroma'));
    }
    if (!empty($_POST['chroma_hp'])) {
        wp_safe_redirect(wp_get_referer());
        exit;
    }
    $name    = sanitize_text_field($_POST['parent_name'] ?? '');
    $email   = sanitize_email($_POST['parent_email'] ?? '');
    $phone   = sanitize_text_field($_POST['parent_phone'] ?? '');
    $campus  = sanitize_text_field($_POST['preferred_campus'] ?? '');
    $ages    = sanitize_text_field($_POST['child_ages'] ?? '');

    $admin_email = get_option('admin_email');
    $body        = sprintf(
        "Name: %s\nEmail: %s\nPhone: %s\nCampus: %s\nAges: %s",
        $name,
        $email,
        $phone,
        $campus,
        $ages
    );

    wp_mail($admin_email, __('New Tour Request', 'chroma'), $body);

    do_action('chroma_leadconnector_webhook', [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'campus' => $campus,
        'ages' => $ages,
        'source' => 'tour_form',
    ]);

    wp_safe_redirect(add_query_arg('tour_submitted', '1', wp_get_referer() ?: home_url('/')));
    exit;
}
