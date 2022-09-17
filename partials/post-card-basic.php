<?php 
$post_id = get_the_ID();
$post_link = get_permalink($post_id);
$post_title = get_the_title();
?>
<div class="pitem item-w1 item-h1">
    <div class="blog-box">
        <div class="post-media">
            <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                <?php the_post_thumbnail('horizontal'); ?>
                <div class="hovereffect">
                    <span></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></h4>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
</div><!-- end col -->