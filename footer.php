    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <?php dynamic_sidebar('footer-area'); ?>
                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <?php dynamic_sidebar('footer-area-2'); ?>
                </div><!-- end col -->

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <?php dynamic_sidebar('footer-area-3'); ?>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="widget">
                        <div class="footer-text text-center">
                            <?php
                            if (has_custom_logo()) {
                                the_custom_logo();
                            }
                            ?>
                            <p class="footer_signature"><?php echo get_theme_mod('footer_signature', ''); ?></p>
                            <div class="social">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div>

                            <hr class="invis">

                            <div class="newsletter-widget text-center">
                                <form class="form-inline">
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                    <button type="submit" class="btn btn-primary"><?php _e('Subscribe', 'wpc'); ?> <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div><!-- end newsletter -->
                        </div><!-- end footer-text -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <div class="copyright"><?php echo get_theme_mod('footer_copy_rights', ''); ?></div>
                </div>
            </div>
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="dmtop"></div>
    
</div><!-- end wrapper -->
    <?php wp_footer(); ?>
</body>
</html>