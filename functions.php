<?php 

if (!function_exists('wpc_load_assets')) {
    function wpc_load_assets()
    {

        $base = get_template_directory_uri() . '/';

        wp_enqueue_style('wpc_bootstrap', $base . 'assets/css/bootstrap.css', [], null);
        wp_enqueue_style('wpc_fontawesome', $base . 'assets/css/font-awesome.min.css', ['wpc_bootstrap'], null);
        wp_enqueue_style('wpc_style', $base . 'assets/style.css', [], null);
        wp_enqueue_style('wpc_responsive', $base . 'assets/css/responsive.css', [], null);
        wp_enqueue_style('wpc_colors', $base . 'assets/css/colors.css', [], null);

        wp_enqueue_script('wpc_jquery', $base . 'assets/js/jquery.min.js', [], null, true);
        // wp_enqueue_script('jquery');
        wp_enqueue_script('wpc_tether', $base . 'assets/js/tether.min.js', [], null, true);
        wp_enqueue_script('wpc_bootstrap', $base . 'assets/js/bootstrap.min.js', [], null, true);
        wp_enqueue_script('wpc_custom', $base . 'assets/js/custom.js', [], null, true);

    }
    add_action('wp_enqueue_scripts', 'wpc_load_assets');
} else {
    // notify the admin
}

// if (!function_exists('wpc_redefine_assets')) {
//     function wpc_redefine_assets()
//     {
//         wp_deregister_script('jquery');
//         wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', [], '3.5.1');
//     }
//     add_action('wp_enqueue_scripts', 'wpc_redefine_assets');
// }