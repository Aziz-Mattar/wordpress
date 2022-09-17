<?php

if (!function_exists('wpc_add_roles')) {
    function wpc_add_roles()
    {
        remove_role('company');
        add_role('company', __('Company', 'wpcourse'), [
            'read' => true,
            'delete_posts' => true,
            'edit_posts' => true,
            'delete_ads' => true,
            'edit_ads' => true,
            'upload_files' => true,
        ]);
    }
}