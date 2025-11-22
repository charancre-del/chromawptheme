<?php
/**
 * Navigation helpers.
 */

action_hook_once('init', function () {
    register_nav_menus([
        'primary' => __('Primary Menu', 'chroma'),
        'utility' => __('Utility Menu', 'chroma'),
    ]);
});

class Chroma_Accessible_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes   = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-depth-' . $depth;
        $class_str = implode(' ', array_map('sanitize_html_class', $classes));

        $output .= '<li class="' . esc_attr($class_str) . '">';
        $output .= '<a href="' . esc_url($item->url) . '" aria-label="' . esc_attr($item->title) . '">';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';
    }
}
