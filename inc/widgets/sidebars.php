<?php

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
        register_sidebars(3, [
            'id' => 'footer-area',
            'name' => 'Footer Area (%d)',
            'description' => 'This sidebar is contained in a footer column',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]);
    }
    add_action('widgets_init', 'wpc_register_sidebars');
}