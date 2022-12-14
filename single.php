<?php

$post_id = get_the_ID();

$post_meta = get_post_meta($post_id);
$visits_count = ((int)($post_meta['wpc_post_views'][0])) + 1;
update_post_meta($post_id, 'wpc_post_views', $visits_count);
$post_link = get_permalink($post_id);
get_header();
while(have_posts()) {
    the_post();
?>
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area">
                        <ol class="breadcrumb hidden-xs-down">
                        <?php echo implode('', wpc_generate_breadcrumb()); ?>
                        </ol>
                        <?php 
                        $categories = get_the_terms($post_id, 'category');
                        if (is_array($categories)) {
                            foreach($categories as $category) {
                                echo '<span class="color-'.wpc_get_term_color($category->term_id).'"><a href="'.get_term_link($category).'" title="">'.$category->name.'</a></span>';
                            }
                        }
                        ?>

                        <h3><?php echo get_the_title(); ?></h3>

                        <div class="blog-meta big-meta">
                            <small><a href="<?php echo get_year_link(get_the_date('Y')) ?>" title=""><?php echo get_the_date('d M, Y', $post_id) ?></a></small>
                            <small><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="">by <?php echo get_the_author_meta('display_name'); ?></a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $visits_count; ?></a></small>
                        </div><!-- end meta -->
                                
                        <?php get_template_part('partials/single-share', null, ['post_link' => $post_link]) ?>
                    </div><!-- end title -->
                    <?php if (has_post_thumbnail($post_id)) { ?>
                    <div class="single-post-media">
                        <?php the_post_thumbnail(); ?>
                    </div><!-- end media -->
                    <?php } ?>

                    <div class="blog-content">  
                        <?php the_content(); ?>
                    </div><!-- end content -->

                    <div class="blog-title-area">
                        <div class="tag-cloud-single">
                            <span><?php _e('Tags', 'wpc'); ?></span>
                            <?php 
                            $tags = get_the_terms($post_id, 'post_tag');
                            if (is_array($tags)) {
                                foreach($tags as $tag) {
                                    echo '<small><a href="'.get_term_link($tag).'" title="">'.$tag->name.'</a></small>';
                                }
                            }
                            ?>
                        </div><!-- end meta -->

                        <?php get_template_part('partials/single-share', null, ['post_link' => $post_link]); ?>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">

                    <?php
                    $next_post = get_next_post();
                    $previous_post = get_previous_post();
                    ?>
                    <div class="custombox prevnextpost clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                            <?php if (is_object($previous_post)) { ?>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="<?php echo get_permalink($previous_post->ID) ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between text-right">
                                                <?php echo get_the_post_thumbnail($previous_post, 'thumbnail'); ?>
                                                <h5 class="mb-1"><?php echo $previous_post->post_title; ?></h5>
                                                <small><?php _e('Previous Post', 'wpc'); ?></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                            <?php if (is_object($next_post)) { ?>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="<?php echo get_permalink($next_post) ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <?php echo get_the_post_thumbnail($next_post, 'thumbnail') ?>
                                                <h5 class="mb-1"><?php echo $next_post->post_title;?></h5>
                                                <small><?php _e('Next Post', 'wpc'); ?></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    <div class="custombox authorbox clearfix">
                        <h4 class="small-title"><?php _e('About author', 'wpc'); ?></h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <?php echo get_avatar(get_the_author_meta('ID'), 90, false, false, ['class' => 'img-fluid rounded-circle']) ?>
                            </div><!-- end col -->

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <h4><?php the_author_link(); ?></h4>
                                <p><?php echo get_the_author_meta('description'); ?></p>

                                <div class="topsocial">
                                <?php
                                $networks = ['facebook', 'twitter', 'instagram', 'youtube', 'pinterest'];
                                foreach ($networks as $network) {
                                    $link = get_the_author_meta('wpc_' . $network . '_link');
                                    if (!empty($link)) {
                                        echo '<a href="'.esc_url($link).'" data-toggle="tooltip" data-placement="bottom" title="'.ucfirst($network).'"><i class="fa fa-'.$network.'"></i></a>';
                                    }
                                }
                                $author_url = get_the_author_meta('url');
                                if (!empty($author_url)) {
                                    echo '<a href="'.esc_url($author_url).'" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>';
                                }
                                ?>
                                
                                </div><!-- end social -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title"><?php _e('You may also like', 'wpc'); ?></h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="single.html" title="">
                                            <img src="upload/menu_06.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="single.html" title="">We are guests of ABC Design Studio</a></h4>
                                        <small><a href="blog-category-01.html" title="">Trends</a></small>
                                        <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="single.html" title="">
                                            <img src="upload/menu_07.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="single.html" title="">Nostalgia at work with family</a></h4>
                                        <small><a href="blog-category-01.html" title="">News</a></small>
                                        <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <?php comments_template(); ?>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->

            <?php get_sidebar(); ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php
}
get_footer();
?>