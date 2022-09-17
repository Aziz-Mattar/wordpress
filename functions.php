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
    }
    add_action('wp_enqueue_scripts', 'wpc_load_assets');
}
if (!function_exists('wpc_setup')) {
    function wpc_setup()
    {
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme', 'wpc_setup');
}




if (!function_exists('wpc_register_sidebars')) {
    function wpc_register_sidebars() {
        register_sidebar([
            'id' => 'blog-sidebar',
            'name' => 'Blog Sidebar',
            'description' => 'This sidebar appears in single posts and blog page',
            'class' => 'blog-sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]);
    }
    add_action('widgets_init', 'wpc_register_sidebars');
}