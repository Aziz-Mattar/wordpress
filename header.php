<!DOCTYPE html>
<html <?php echo get_language_attributes(); ?>>
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Cloapedia - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet"> 

    <?php wp_head(); ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php global $base; ?>
<!-- LOADER -->
<div id="preloader">
    <img class="preloader" src="<?php echo $base; ?>assets/images/loader.gif" alt="">
</div><!-- end loader -->
<!-- END LOADER -->

<div id="wrapper">
    <div class="collapse top-search" id="collapseExample">
        <div class="card card-block">
            <div class="newsletter-widget text-center">
                <form class="form-inline">
                    <input type="text" class="form-control" placeholder="What you are looking for?">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div><!-- end newsletter -->
        </div>
    </div><!-- end top-search -->

    <div class="topbar-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                    <div class="topsocial">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                    </div><!-- end social -->
                </div><!-- end col -->

                <div class="col-lg-4 hidden-md-down">
                    <div class="topmenu text-center">
                        <?php 
                        wp_nav_menu([
                            'theme_location' => 'top-menu',
                            'container' => '',
                            'menu_class' => 'list-inline',
                            'walker' => new Wpc_Top_Menu_Walker
                        ]);
                        ?>
                    </div><!-- end topmenu -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="topsearch text-right">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                    </div><!-- end search -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end header-logo -->
    </div><!-- end topbar -->

    <div class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        }
                        ?>
                    </div><!-- end logo -->
                </div>
            </div><!-- end row -->
        </div><!-- end header-logo -->
    </div><!-- end header -->

    <header class="header">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-toggleable-md">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php 
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container_id' => 'cloapediamenu',
                    'container_class' => 'collapse navbar-collapse justify-content-md-center',
                    'menu_class' => 'navbar-nav',
                    'walker' => new Wpc_Main_Menu_Walker
                ]);
                ?>
            </nav>
        </div><!-- end container -->
    </header><!-- end header -->
