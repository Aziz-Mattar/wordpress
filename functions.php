<?php 

function load_assets()
{

    $base = get_template_directory_uri() . '/';

    wp_enqueue_style('bootstrap', $base . 'assets/css/bootstrap.css', [], false);
    wp_enqueue_style('fontsawesome', $base . 'assets/css/font-awesome.min.css', ['bootstrap'], false);
    wp_enqueue_style('template-style', $base . 'assets/style.css', [], false);
    wp_enqueue_style('template-responsive', $base . 'assets/css/responsive.css', [], false);
    wp_enqueue_style('template-colors', $base . 'assets/css/colors.css', [], false);

    wp_enqueue_script('jq-script', $base . 'assets/js/jquery.min.js', [], false, true);
    wp_enqueue_script('tether-script', $base . 'assets/js/tether.min.js', [], false, true);
    wp_enqueue_script('bootstrap-script', $base . 'assets/js/bootstrap.min.js', [], false, true);
    wp_enqueue_script('custom-script', $base . 'assets/js/custom.js', [], false, true);

}
add_action('wp_enqueue_scripts', 'load_assets');