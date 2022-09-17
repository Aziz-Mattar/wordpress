<?php 

class Wpc_Popular_Posts extends WP_Widget
{
    function __construct() {
        parent::__construct('wpc_popular_posts', 'WPC Popular Posts');
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . 'Popular Posts' . $args['after_title'];
        $popular_posts = get_posts([
            'orderby' => 'meta_value_num',
            'meta_key' => 'wpc_post_views',
            'order' => 'desc',
            'numberposts' => 4
        ]);
        if (count($popular_posts)) {
            echo '<div class="blog-list-widget"><div class="list-group">';
            foreach($popular_posts as $post) {
                ?>
                <a href="<?php echo get_permalink($post) ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <?php echo get_the_post_thumbnail($post, 'thumbnail', ['class' => 'img-fluid float-left']) ?>
                        <h5 class="mb-1"><?php echo $post->post_title; ?></h5>
                        <small>
                        <i class="fa fa-eye"></i><?php echo ((int)(get_post_meta($post->ID, 'wpc_post_views', true))) ?>
                        </small>
                    </div>
                </a>
                <?php
            }
            echo '</div></div>';
        }
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function() {
    register_widget('Wpc_Popular_Posts');
});