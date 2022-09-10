<?php 

get_header();

?>

<div class="page-title wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-user-md bg-grey"></i> <?php echo get_the_archive_title(); ?> <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">Fashion</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="portfolio row">
                    <?php 
                    if (have_posts()) {
                        while(have_posts()) {
                            the_post();
                            $post_id = get_the_ID();
                            $post_link = get_permalink($post_id);
                            $post_title = get_the_title();
                            $post_categories = get_the_terms($post_id, 'category');
                            ?>
                            <div class="pitem item-w1 item-h1">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <?php
                                        if (is_array($post_categories)) {
                                            foreach ($post_categories as $category) {
                                                echo '<span class="bg-grey"><a href="'.get_term_link($category).'" title="">'.$category->name.'</a></span>';
                                            }
                                        }
                                        ?>
                                        
                                        <h4><a href="<?php echo $post_link; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></h4>
                                        <small><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>" title="">By: <?php echo get_the_author_meta('display_name'); ?></a></small>
                                        <small><a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')) ?>" title=""><?php echo get_the_date('d M, Y') ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                            <?php
                        }
                    }
                    ?>
                    </div><!-- end portfolio -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php

get_footer();

?>