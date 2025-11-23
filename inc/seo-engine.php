<?php
/**
 * Lightweight SEO helpers.
 */

action_hook_once('wp_head', function () {
    if (is_singular('location')) {
        echo chroma_location_schema();
    }
    if (is_singular('post') || is_singular('stories')) {
        echo chroma_article_schema();
    }
    echo chroma_breadcrumb_schema();
}, 5);

function chroma_location_schema(): string
{
    $location = get_post();
    if (!$location) {
        return '';
    }

    $address = chroma_field('address', $location->ID, []);
    $geo     = chroma_field('geo_coordinates', $location->ID, []);

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => get_the_title($location),
        'url' => get_permalink($location),
        'image' => get_the_post_thumbnail_url($location, 'chroma-hero'),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $address['street'] ?? '',
            'addressLocality' => $address['city'] ?? '',
            'addressRegion' => $address['state'] ?? '',
            'postalCode' => $address['zip'] ?? '',
            'addressCountry' => 'US',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => $geo['lat'] ?? '',
            'longitude' => $geo['lng'] ?? '',
        ],
        'telephone' => $address['phone'] ?? '',
    ];

    return '<script type="application/ld+json">' . wp_json_encode($data) . '</script>';
}

function chroma_article_schema(): string
{
    if (!is_singular()) {
        return '';
    }
    $post = get_post();
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => get_the_title($post),
        'datePublished' => get_the_date('c', $post),
        'dateModified' => get_the_modified_date('c', $post),
        'author' => get_bloginfo('name'),
        'image' => get_the_post_thumbnail_url($post, 'large'),
    ];
    return '<script type="application/ld+json">' . wp_json_encode($data) . '</script>';
}

function chroma_breadcrumb_schema(): string
{
    if (is_front_page()) {
        return '';
    }
    $items = [];
    $position = 1;
    $items[] = [
        '@type' => 'ListItem',
        'position' => $position++,
        'name' => get_bloginfo('name'),
        'item' => home_url('/'),
    ];
    if (is_singular()) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => get_the_title(),
            'item' => get_permalink(),
        ];
    }

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
    return '<script type="application/ld+json">' . wp_json_encode($data) . '</script>';
}

/**
 * Basic dynamic sitemap at /sitemap.xml covering key CPTs.
 */
action_hook_once('init', function () {
    add_rewrite_rule('^sitemap\\.xml$', 'index.php?chroma_sitemap=1', 'top');
});

add_filter('query_vars', function ($vars) {
    $vars[] = 'chroma_sitemap';
    return $vars;
});

add_action('template_redirect', function () {
    if (get_query_var('chroma_sitemap')) {
        header('Content-Type: application/xml; charset=utf-8');
        echo chroma_render_sitemap();
        exit;
    }
});

function chroma_render_sitemap(): string
{
    $urls = [];
    $post_types = ['page', 'post', 'program', 'location', 'stories'];
    foreach ($post_types as $type) {
        $posts = get_posts([
            'post_type' => $type,
            'post_status' => 'publish',
            'numberposts' => -1,
        ]);
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => get_permalink($post),
                'lastmod' => get_the_modified_time('c', $post),
            ];
        }
    }

    $xml  = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . esc_url($url['loc']) . '</loc>';
        if (!empty($url['lastmod'])) {
            $xml .= '<lastmod>' . esc_html($url['lastmod']) . '</lastmod>';
        }
        $xml .= '</url>';
    }
    $xml .= '</urlset>';

    return $xml;
}
