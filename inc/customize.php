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

        // Footer Background
        $wp_customize->add_setting('footer_image', [
            'default' => '',
        ]);
        $wp_customize->add_control(new WP_Customize_Media_Control(
            $wp_customize,
            'footer_image',
            [
                'label' => 'Footer Image',
                'section' => 'footer_settings',
                'mime_type' => 'image',
            ]
        ));

        // Footer Color
        $wp_customize->add_setting('footer_color', [
            'default' => '',
        ]);
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            [
                'label' => 'Footer Color',
                'section' => 'footer_settings',
            ]
        ));
    }
    add_action('customize_register', 'wpc_customize_register');
}


add_action('wp_head', function() {
    echo '<style>.footer{';
    $custom_footer_background = get_theme_mod('footer_image', '');
    if (!empty($custom_footer_background)) {
        echo 'background-image:url('.wp_get_attachment_image_url($custom_footer_background, 'full').');';
    }
    $footer_custom_color = get_theme_mod('footer_color', '');
    if (!empty($footer_custom_color)) {
        echo 'background-color:' . $footer_custom_color . ';';
    }
    echo '}</style>';
}, 99);
