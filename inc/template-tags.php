<?php
/**
 * Helper functions.
 */

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
    $buttons = get_field('parents_buttons', get_the_ID()) ?: [];
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
