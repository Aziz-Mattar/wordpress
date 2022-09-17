<?php 

class Wpc_Categories extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'wpc_categories_widget',
            'WPC Categories',
            ['description' => 'This widget creates a categories list.']
        );
    }
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>
        <div class="link-widget">
            <ul>
            <?php 
            $popular_categories = get_terms([
                'taxonomy' => 'category',
                'orderby' => 'count',
                'order' => 'DESC',
                'hide_empty' => true
            ]);
            if (is_array($popular_categories)) {
                foreach ($popular_categories as $category) {
                    echo '<li><a href="'.get_term_link($category).'">'.$category->name.' <span>('.$category->count.')</span></a></li>';
                }
            }
            ?>
            </ul>
        </div><!-- end link-widget -->
        <?php 
        echo $args['after_widget'];
    }
    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = 'Popular Categories';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>">Widget Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }
    function update($new_instance, $old_instance)
    {
        $new_data = [];
        if (!empty($new_instance['title'])) {
            $new_data['title'] = strip_tags($new_instance['title']);
        } else {
            $new_data['title'] = $old_instance['title'];
        }
        return $new_data;
    }
}