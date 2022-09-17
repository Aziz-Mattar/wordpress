<?php

/**
 * Plugin Name: WP Course
 * Plugin URI: https://fjobeir.com
 * Description: Test plugin for WordPress developers course.
 * Version: 1.0.0
 * Requires at least: 2.9
 * Requires PHP: 5.6
 * Author: Feras Jobeir
 * Author URI: https://fjobeir.com
 * License: GPL V2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wpcourse
 * Domain Path: /languages
 */

if (!function_exists('wpc_load_wpcourse_translation')) {
    function wpc_load_wpcourse_translation()
    {
        load_plugin_textdomain('wpcourse', false, basename(dirname(__FILE__)) . '/languages/');
    }
    add_action('plugins_loaded', 'wpc_load_wpcourse_translation');
}