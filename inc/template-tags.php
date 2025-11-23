<?php
/**
 * Helper functions.
 */

/**
 * Safe wrapper to fetch custom fields without requiring ACF.
 */
function chroma_field(string $field, $post_id = null, $default = null)
{
    $value = null;

    if (function_exists('get_field')) {
        $value = get_field($field, $post_id);
    } else {
        $id    = $post_id ?: get_the_ID();
        $value = get_post_meta($id, $field, true);
    }

    if ($value === '' || $value === null) {
        return $default;
    }

    return $value;
}

function chroma_cta(string $text, string $url, string $class = 'btn btn-primary'): string
{
    $text = apply_filters('chroma_cta_text', $text, $url);
    $url  = apply_filters('chroma_cta_url', $url, $text);
    return '<a class="' . esc_attr($class) . '" href="' . esc_url($url) . '" data-event="chroma_cta_click">' . esc_html($text) . '</a>';
}

function chroma_location_query_args(array $overrides = []): array
{
    $defaults = [
        'post_type' => 'location',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
    ];

    return apply_filters('chroma_location_query_args', wp_parse_args($overrides, $defaults));
}

/**
 * Parents forms buttons shortcode.
 */
add_shortcode('chroma_parents_forms', function ($atts = []) {
    $buttons = chroma_field('parents_buttons', get_the_ID(), []);
    if (!$buttons) {
        return '';
    }
    ob_start();
    ?>
    <div class="parents-buttons__list">
        <?php foreach ($buttons as $button) :
            $label = $button['label'] ?? '';
            $url   = $button['url'] ?? '';
            if (!$label || !$url) {
                continue;
            }
            ?>
            <a class="btn btn-secondary" href="<?php echo esc_url($url); ?>" data-event="chroma_cta_click">
                <?php echo esc_html($label); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
    return ob_get_clean();
});
