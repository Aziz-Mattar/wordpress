<?php

$base = get_template_directory_uri() . '/';

if (!function_exists('wpc_load_assets')) {
    function wpc_load_assets()
    {
        global $base;
        wp_enqueue_style('wpc_bootstrap', $base . 'assets/css/bootstrap.css', [], null);
        wp_enqueue_style('wpc_fontawesome', $base . 'assets/css/font-awesome.min.css', ['wpc_bootstrap'], null);
        wp_enqueue_style('wpc_style', $base . 'assets/style.css', [], null);
        wp_enqueue_style('wpc_responsive', $base . 'assets/css/responsive.css', [], null);
        wp_enqueue_style('wpc_colors', $base . 'assets/css/colors.css', [], null);
        wp_enqueue_style('wpc_theme_style', $base . 'style.css', [], rand(1, 10000));
        wp_enqueue_script('wpc_jquery', $base . 'assets/js/jquery.min.js', [], null, true);
        wp_enqueue_script('wpc_tether', $base . 'assets/js/tether.min.js', [], null, true);
        wp_enqueue_script('wpc_bootstrap', $base . 'assets/js/bootstrap.min.js', [], null, true);
        wp_enqueue_script('wpc_masonry', $base . 'assets/js/masonry.js', [], null, true);
        wp_enqueue_script('wpc_custom', $base . 'assets/js/custom.js', [], null, true);
        if (is_single()) {
            wp_enqueue_script('comment-reply');
        }
    }
    add_action('wp_enqueue_scripts', 'wpc_load_assets');
}
if (!function_exists('wpc_setup')) {
    function wpc_setup()
    {
        add_theme_support('post-thumbnails');
        register_nav_menus([
            'top-menu' => __('Top Menu', 'wpc'),
            'main-menu' => __('Main Menu', 'wpc'),
        ]);
        add_theme_support('custom-logo', [
            'width' => 300,
            'height' => 100,
        ]);
        add_theme_support('customize-selective-refresh-widgets');
        add_image_size('horizontal', 800, 460, true);
        add_theme_support('html5', [
            'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
        ]);
    }
    add_action('after_setup_theme', 'wpc_setup');
}

add_filter('get_the_archive_title', function($title, $original_title, $prefix) {
    return $original_title;
}, 10, 3);

require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/walkers/walkers.php';
require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/comments.php';