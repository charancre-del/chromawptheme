<?php
/**
 * Shared helpers for Prismpath-inspired landing sections.
 */

if (!function_exists('chroma_get_field_fallback')) {
    function chroma_get_field_fallback($key, $fallback = '', $context = null)
    {
        if (function_exists('get_field')) {
            $value = $context ? get_field($key, $context) : get_field($key);
            if (!empty($value)) {
                return $value;
            }
        }

        if (function_exists('get_option')) {
            $option_value = $context ? get_option($context . '_' . $key) : get_option($key);
            if (!empty($option_value)) {
                return $option_value;
            }
        }

        return $fallback;
    }
}

if (!function_exists('chroma_get_contact_options')) {
    function chroma_get_contact_options()
    {
        $phone   = chroma_get_field_fallback('contact_phone', '404-555-0123', 'option');
        $email   = chroma_get_field_fallback('contact_email', get_bloginfo('admin_email'), 'option');
        $address = chroma_get_field_fallback('contact_address', __('Metro Atlanta, GA', 'chroma'), 'option');

        return [
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
        ];
    }
}

if (!function_exists('chroma_build_cta')) {
    function chroma_build_cta($primary_anchor = '#contact', $primary_label = null)
    {
        $contacts = chroma_get_contact_options();

        return [
            'title' => chroma_get_field_fallback('cta_title', __('Ready to visit?', 'chroma')),
            'subtitle' => chroma_get_field_fallback(
                'cta_subtitle',
                __('Tell us about your family and a Chroma Director will reach out to confirm your tour.', 'chroma')
            ),
            'primary' => [
                'url' => chroma_get_field_fallback('cta_primary_url', $primary_anchor),
                'label' => chroma_get_field_fallback('cta_primary_label', $primary_label ?: __('Schedule a Tour', 'chroma')),
                'id' => 'cta-primary',
            ],
            'secondary' => [
                'url' => chroma_get_field_fallback('cta_secondary_url', isset($contacts['phone']) ? 'tel:' . preg_replace('/\D+/', '', $contacts['phone']) : '#'),
                'label' => chroma_get_field_fallback('cta_secondary_label', __('Call a Director', 'chroma')),
                'id' => 'cta-secondary',
            ],
            'contacts' => $contacts,
        ];
    }
}

if (!function_exists('chroma_build_hero_from_page')) {
    function chroma_build_hero_from_page($page_prefix = 'hero')
    {
        $prefix = $page_prefix ? $page_prefix . '_' : '';
        $title = chroma_get_field_fallback($prefix . 'title', get_the_title());
        $lede = chroma_get_field_fallback($prefix . 'lede', __('Modern early learning environments with research-based curriculum.', 'chroma'));

        return [
            'eyebrow' => chroma_get_field_fallback($prefix . 'eyebrow', __('Experience Chroma', 'chroma')),
            'title' => $title,
            'lede' => $lede,
            'kicker' => chroma_get_field_fallback($prefix . 'kicker', __('19+ Metro Atlanta locations', 'chroma')),
            'primary' => [
                'label' => chroma_get_field_fallback($prefix . 'primary_label', __('Schedule a Tour', 'chroma')),
                'url' => chroma_get_field_fallback($prefix . 'primary_url', '#contact'),
                'id' => $prefix . 'primary',
            ],
            'secondary' => [
                'label' => chroma_get_field_fallback($prefix . 'secondary_label', __('Explore Programs', 'chroma')),
                'url' => chroma_get_field_fallback($prefix . 'secondary_url', '#programs'),
                'id' => $prefix . 'secondary',
            ],
            'media' => [
                'tagline' => chroma_get_field_fallback($prefix . 'media_tagline', __('Beautiful spaces', 'chroma')),
                'caption' => chroma_get_field_fallback($prefix . 'media_caption', __('Warm teachers, joyful classrooms, real-time updates.', 'chroma')),
                'image' => chroma_get_field_fallback($prefix . 'media_image', ''),
            ],
        ];
    }
}
