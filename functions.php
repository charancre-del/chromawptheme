<?php
/**
 * Theme bootstrap.
 */

if (!defined('CHROMA_THEME_VERSION')) {
    $style_path = get_template_directory() . '/dist/main.css';
    define('CHROMA_THEME_VERSION', file_exists($style_path) ? filemtime($style_path) : '0.1.0');
}

/**
 * Simple autoloader for inc files.
 *
 * @param array $files
 * @return void
 */
function autoload_files(array $files): void
{
    foreach ($files as $file) {
        $path = CHROMA_THEME_PATH . '/' . $file;
        if (file_exists($path)) {
            require_once $path;
        }
    }
}

define('CHROMA_THEME_PATH', get_template_directory());
define('CHROMA_THEME_URI', get_template_directory_uri());

autoload_files([
    'inc/setup.php',
    'inc/enqueue.php',
    'inc/nav-menus.php',
    'inc/cpt-programs.php',
    'inc/cpt-locations.php',
    'inc/cpt-stories.php',
    'inc/acf-options.php',
    'inc/acf-homepage.php',
    'inc/template-tags.php',
    'inc/cleanup.php',
    'inc/seo-engine.php',
    'inc/city-slug-logic.php',
    'inc/spanish-variant-generator.php',
    'inc/monthly-seo-cron.php',
]);
