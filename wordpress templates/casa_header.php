<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package Bootstrap Canvas WP
 * @since Bootstrap Canvas WP 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>

    <?php
    /*
     * We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    /*
     * Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();
    ?>
</head>
<body <?php body_class(); ?>>

<nav id="site-navigation" class="navigation main-navigation" role="navigation">
    <div class="container">
        <div class="header_logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="header_logo" src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/logo.jpg"></a>
        </div>
        <ul id="primary-menu" class="nav-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'primary-menu',
                'container' => 'false',
                'items_wrap' => '%3$s',
                'fallback_cb' => 'bootstrap_canvas_wp_menu_fallback',
            ));
            ?>
            <li class="menu-toggle">
                <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
            </li>
        </ul>
        <div class="contact_icons">
            <div class="row">
                <div class="col-md-5">
                    <a href="https://www.facebook.com/Casa-El-Buen-Samaritano-658838764147246/" title="Facebook" target="_blank"> <span class="icon" id="facebook"></span> </a>
                    <a href="https://twitter.com/casaelbuen" title="Twitter"> <span class="icon" id="twitter" target="_blank"></span> </a>
                    <a href="mailto:info@casaelbuen.org" title="Mail"> <span class="icon" id="mail"></span> </a>
                </div>
                <div class="col-md-4">
                    <div style="float: right;">
                        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
                            <div>
                                <input type="text" value="<?php the_search_query(); ?>" name="s" id="s"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="qtranslate-2" class="widget qtranxs_widget">
                        <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav><!-- #site-navigation -->

<?php $header_image = get_header_image(); ?>
<div class="blog-header"
     <?php if (get_header_image()) : ?>style="background-image: url( '<?php echo esc_url($header_image); ?>'); background-size: cover; background-repeat: no-repeat; background-position: top left; margin-bottom: 30px; width: 100%; height: 100%; min-height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; position: relative;"<?php endif; ?>>
    <div class="container"
         <?php if (get_header_image()) : ?>style="height: auto; min-height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; position: relative;"<?php endif; ?>>
        <?php if (display_header_text()) : ?>
            <?php $header_text_color = get_header_textcolor(); ?>


            <?php if (is_front_page()) : ?>

                <link rel="stylesheet"
                      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">

                <div id="first-slider">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <!-- Item 1 -->
                            <div class="item active slide1">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-3 text-right">
                                            <img style="max-width: 200px;" data-animation="animated zoomInLeft"
                                                 src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/cross.png">
                                        </div>
                                        <div class="col-md-9 text-left">
                                            <h3 data-animation="animated fadeInDown">Needy people...</h3>
                                            <h4 data-animation="animated fadeInUp">Hearing God's love every week.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="item slide2">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-7 text-left">
                                            <h3 data-animation="animated bounceInDown">Patients here receive the highest
                                                standards of care...</h3>
                                            <h4 data-animation="animated bounceInUp">From people like you.</h4>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <img style="max-width: 200px;" data-animation="animated zoomInLeft"
                                                 src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/cross.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="item slide3">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-7 text-left">
                                            <h3 data-animation="animated fadeInRight">Needy people...</h3>
                                            <h4 data-animation="animated fadeInLeft">Hearing God's love every week.</h4>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <img style="max-width: 200px;" data-animation="animated zoomInLeft"
                                                 src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/cross.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item 4 -->
                            <div class="item slide4">
                                <div class="row">
                                    <div class="container">
                                        <div class="col-md-7 text-left">
                                            <h3 data-animation="animated bounceInRight">Patients here receive the
                                                highest standards of care...</h3>
                                            <h4 data-animation="animated bounceInUp">From people like you.</h4>
                                        </div>
                                        <div class="col-md-5 text-right">
                                            <img style="max-width: 200px;" data-animation="animated zoomInLeft"
                                                 src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/cross.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item 4 -->

                        </div>
                        <!-- End Wrapper for slides-->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="prev">
                            <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="next">
                            <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


                <footer>
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1 text-center">


                        </div>
                    </div>
                </footer>

            <?php endif; ?>

            <?php if (function_exists('the_custom_logo')) :
                the_custom_logo();
            endif; ?>

            <!-- <h1 class="blog-title" style="color: #<?php echo $header_text_color ?>;"><?php bloginfo('name'); ?></h1>
            <p class="lead blog-description" style="color: #<?php echo $header_text_color ?>"><?php bloginfo('description'); ?></p> -->
        <?php else : ?>

            <!-- <h1 class="blog-title" style="visibility: hidden; margin: 0; padding: 0; font-size: 0;"><?php bloginfo('name'); ?></h1>
            <p class="lead blog-description" style="visibility: hidden; margin: 0; padding: 0; font-size: 0;"><?php bloginfo('description'); ?></p>  -->
        <?php endif; ?>
    </div>
</div>

<div class="container">