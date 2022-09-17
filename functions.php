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
    }
    add_action('after_setup_theme', 'wpc_setup');
}

if (!function_exists('wpc_get_term_color')) {
    function wpc_get_term_color($term_id)
    {
        $color = 'aqua';
        $term_color = get_term_meta($term_id, 'wpc_icon_color', true);
        return !empty($term_color) ? $term_color : $color;
    }
}

if (!function_exists('wpc_get_archive_title')) {
    function wpc_get_archive_title()
    {
        $main_title = '';
        if (is_archive()) {
            if (is_category() || is_tag() || is_tax()) {
                $term = get_queried_object();
                $term_meta = get_term_meta($term->term_id);
                if (!empty($term_meta['wpc_icon_code'][0])) {
                    $main_title .= '<i class="'.esc_attr($term_meta['wpc_icon_code'][0] . ' bg-' . wpc_get_term_color($term->term_id)).'"></i>';
                }
            }
            $main_title .= get_the_archive_title();
            if (is_category() || is_tag() || is_tax()) {
                if (!empty($term->description)) {
                    $main_title .= '<small class="hidden-xs-down hidden-sm-down">'.$term->description.'</small>';
                }
            }
        }
        return !empty($main_title) ? '<h2>' . $main_title . '</h2>' : '';
    }
}

if (!function_exists('wpc_generate_breadcrumb')) {
    function wpc_generate_breadcrumb()
    {
        $links = [];
        $links[] = '<a href="' . home_url() . '">'.__('Home', 'wpc').'</a>';
        if (is_archive()) {
            $links[] = get_the_archive_title();
        } elseif (is_404()) {
            $links[] = __('Not Found', 'wpc');
        } elseif (is_search()) {
            $links[] = __('Search Page', 'wpc');
        } elseif (is_singular()) {
            $post_type_archive = get_post_type_archive_link(get_post_type());
            if ($post_type_archive) {
                $post_type_object = get_post_type_object(get_post_type());
                $links[] = '<a href="'.esc_url($post_type_archive).'">'.$post_type_object->labels->name.'</a>';
            }
            $links[] = get_the_title();
        }
        $count = count($links);
        for($i = 0; $i < $count; $i++) {
            $is_active = ($i == ($count - 1)) ? ' active' : '';
            $links[$i] = '<li class="breadcrumb-item' . esc_attr($is_active) . '">' . $links[$i] . '</li>';
        }
        return $links;
    }
}

require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/walkers/walkers.php';
require get_template_directory() . '/inc/customize.php';