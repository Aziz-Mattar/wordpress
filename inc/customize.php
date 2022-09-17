<?php

if (!function_exists('wpc_customize_register')) {
    function wpc_customize_register($wp_customize) {
        // Add section
        $wp_customize->add_section('footer_settings', [
            'title' => 'Footer Settings',
            'priority' => 115,
        ]);

        // Copyrights
        $wp_customize->add_setting('footer_copy_rights', [
            'default' => '',
        ]);
        $wp_customize->add_control('footer_copy_rights', [
            'type' => 'text',
            'section' => 'footer_settings',
            'label' => 'Copyrights Text',
        ]);

        // Footer Signature
        $wp_customize->add_setting('footer_signature', [
            'default' => '',
        ]);
        $wp_customize->add_control('footer_signature', [
            'type' => 'textarea',
            'section' => 'footer_settings',
            'label' => 'Footer Signature',
        ]);
    }
    add_action('customize_register', 'wpc_customize_register');
}
