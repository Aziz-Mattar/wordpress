<?php 

class Wpc_Popular_Posts extends WP_Widget
{
    function __construct() {
        parent::__construct('wpc_popular_posts', 'WPC Popular Posts');
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        }
        $popular_posts = get_posts([
            'orderby' => 'meta_value_num',
            'meta_key' => 'wpc_post_views',
            'order' => 'desc',
            'numberposts' => (isset($instance['posts_count']) && is_numeric($instance['posts_count']) && $instance['posts_count'] > 0) ? $instance['posts_count'] : 4,
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
                        <?php
                        if (isset($instance['alt_content']) && $instance['alt_content'] == 'post_views') {
                            ?><i class="fa fa-eye"></i><?php echo ((int)(get_post_meta($post->ID, 'wpc_post_views', true))) ?><?php
                        } else {
                            echo get_the_date('d M, Y', $post);
                        }
                        ?>
                        </small>
                    </div>
                </a>
                <?php
            }
            echo '</div></div>';
        }
        echo $args['after_widget'];
    }

    function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = 'Popular Posts';
        }
        if (isset($instance['posts_count'])) {
            $posts_count = $instance['posts_count'];
        } else {
            $posts_count = 4;
        }
        if (isset($instance['alt_content'])) {
            $alt_content = $instance['alt_content'];
        } else {
            $alt_content = 'post_date';
        }
        ?>
        <p>
            <label for="">Widget Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="">Posts Count</label>
            <input type="number" name="<?php echo $this->get_field_name('posts_count'); ?>" value="<?php echo $posts_count; ?>" min="1" id="">
        </p>
        <p>
            <label for="">Alt Content</label>
            <select name="<?php echo $this->get_field_name('alt_content') ?>" id="">
                <option value="post_date" <?php echo ($alt_content == 'post_date') ? 'selected' : ''; ?>>Post date</option>
                <option value="post_views" <?php echo ($alt_content == 'post_views') ? 'selected' : ''; ?>>Post views</option>
            </select>
        </p>
        <?php
    }
}

add_action('widgets_init', function() {
    register_widget('Wpc_Popular_Posts');
});