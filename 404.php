<?php 

get_header();
?>
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-question"></i> Not Found</h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Not Found</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="notfound">   
                        <div class="row">
                            <div class="col-md-8 offset-md-2 text-center">
                                <h2>404</h2>
                                <h3><?php _e('Oh no! Page Not Found', 'wpc'); ?></h3>
                                <p><?php _e("The page you are looking for no longer exists. Perhaps you can return back to the site's homepage and see if you can find what you are looking for. Or, you can try finding it with the information below.", 'wpc'); ?></p>
                                <a href="#" class="btn btn-primary"><?php _e('Back to Home', 'wpc'); ?></a>
                            </div>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php
get_footer();

?>