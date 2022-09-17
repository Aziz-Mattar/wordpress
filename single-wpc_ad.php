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
                        $categories = get_the_terms($post_id, 'wpc_ad_group');
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
                    <?php
                    if (!empty($post_meta['wpc_ad_url'][0])) {
                        echo '<h4><a href="'.esc_url($post_meta['wpc_ad_url'][0]).'">'.__('Click Here', 'wpc').'</a></h4>';
                    }
                    ?>

                    <div class="blog-title-area">

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


                    <hr class="invis1">

                    <div class="custombox authorbox clearfix">
                        <h4 class="small-title"><?php _e('About author', 'wpc'); ?></h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                            </div><!-- end col -->

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <h4><a href="#"><?php echo get_the_author_meta('display_name'); ?></a></h4>
                                <p><?php echo get_the_author_meta('description'); ?></p>

                                <div class="topsocial">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                </div><!-- end social -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">3 Comments</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img src="upload/author.jpg" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading user_name">Amanda Martines <small>5 days ago</small></h4>
                                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar jean.</p>
                                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img src="upload/author_01.jpg" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small></h4>

                                            <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div>
                                    <div class="media last-child">
                                        <a class="media-left" href="#">
                                            <img src="upload/author_02.jpg" alt="" class="rounded-circle">
                                        </a>
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small></h4>
                                            <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                            <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">Leave a Reply</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper">
                                    <input type="text" class="form-control" placeholder="Your name">
                                    <input type="text" class="form-control" placeholder="Email address">
                                    <input type="text" class="form-control" placeholder="Website">
                                    <textarea class="form-control" placeholder="Your comment"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
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