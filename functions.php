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
        wp_enqueue_script('comment-reply');
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
        add_theme_support('html5', [
            'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'
        ]);
    }
    add_action('after_setup_theme', 'wpc_setup');
}

add_filter('get_the_archive_title', function($title, $original_title, $prefix) {
    return $original_title;
}, 10, 3);

add_filter('comment_form_fields', function ($fields) {
    return [
        'author' => $fields['author'],
        'email' => $fields['email'],
        'url' => $fields['url'],
        'comment' => $fields['comment'],
    ];
});

if (!function_exists('wpc_comment_callback')) {
    function wpc_comment_callback($comment, $args, $depth)
    {
        ?>
        <div <?php comment_class('media'); ?> id="comment-<?php echo $comment->comment_ID ?>">
            <a class="media-left" href="#">
                <?php echo get_avatar($comment, $args['avatar_size'], false, false, ['class' => 'rounded-circle']) ?>
            </a>
            <div class="media-body">
                <h4 class="media-heading user_name">
                <?php echo get_comment_author_link($comment); ?> 
                <small><?php printf(
                    /* translators: %s is a time difference */
                    __('%s ago', 'wpc'),
                    human_time_diff(get_comment_time('U'), current_time('U'))
                ); ?></small></h4>
                <?php
                if ($comment->comment_approved == 0) {
                    echo '<p>'.__('Your comment is awaiting moderation', 'wpc').'</p>';
                }
                ?>
                <p><?php comment_text(); ?></p>
                <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                <?php comment_reply_link([
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => __('Reply', 'wpc'),
                ]); ?>
            </div>
        <?php
    }
}

require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/walkers/walkers.php';
require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/helpers.php';