<?php

if (!function_exists('wpc_register_taxonomies')) {
    function wpc_register_taxonomies()
    {
        register_taxonomy('wpc_ad_group', ['wpc_ad'], [
            'labels' => [
                'name'                       => __( 'Groups', 'wpcourse' ),
                'singular_name'              => __( 'Group', 'wpcourse' ),
                'search_items'               => __( 'Search Groups', 'wpcourse' ),
                'popular_items'              => __( 'Popular Groups', 'wpcourse' ),
                'all_items'                  => __( 'All Groups', 'wpcourse' ),
                'parent_item'                => __( 'Parent Group', 'textdomain' ),
                'parent_item_colon'          => __( 'Parent Group:', 'textdomain' ),
                'edit_item'                  => __( 'Edit Group', 'wpcourse' ),
                'update_item'                => __( 'Update Group', 'wpcourse' ),
                'add_new_item'               => __( 'Add New Group', 'wpcourse' ),
                'new_item_name'              => __( 'New Group Name', 'wpcourse' ),
                'separate_items_with_commas' => __( 'Separate groups with commas', 'wpcourse' ),
                'add_or_remove_items'        => __( 'Add or remove groups', 'wpcourse' ),
                'choose_from_most_used'      => __( 'Choose from the most used groups', 'wpcourse' ),
                'not_found'                  => __( 'No groups found.', 'wpcourse' ),
                'menu_name'                  => __( 'Groups', 'wpcourse' ),
            ],
            'hierarchical' => true,
            'rewrite' => [
                'slug' => __('ad-group', 'wpcourse'),
            ],
            'show_in_rest' => true,
        ]);
    }
    add_action('init', 'wpc_register_taxonomies');
}