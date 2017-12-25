<?php
/**
 * Template Name: Homepage
 */
//get_header();
include(TEMPLATEPATH . '/header_homepage.php');
?>


<!-- ***************** HOME PAGE ***************** -->


<header id="header_homepage" style="background: url('<?= get_template_directory_uri(); ?>/images/header_img.png');">
    <div id="blue"></div>
    <div class="container">
        <div class="row">
            <div class="threecol">
                <!-- logo -->
                <a href="<?php echo get_bloginfo('siteurl'); ?>"><img class="logo_homepage" src="<?= get_template_directory_uri(); ?>/images/logo.png"></a>
            </div>

            <div class="ninecol last">                
                <nav class="main_nav">
                    <?php wp_nav_menu(array('menu' => 'main', 'container_class' => '', 'menu_id' => 'main_nav_ul', 'theme_location' => 'primary')); ?>

                    <!--                     menu for small display  -->
                    <?php
                    $menu_name = 'main';
                    //if (( $locations = get_nav_menu_locations() ) && isset($locations[$menu_name])) {
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);

                    //$menu_items = wp_get_nav_menu_items($menu->term_id);
                    $menu_items = wp_get_nav_menu_items($menu_name);
                    if (!empty($menu_items)) {
                        $menu_list = '<select id="menu_select"><option value="" selected="selected"></option>';

                        foreach ((array) $menu_items as $key => $menu_item) {
                            $title = $menu_item->title;
                            $url = $menu_item->url;
                            $menu_list .= '<option value="' . $url . '">' . $title . '</option>  ';
                        }
                        $menu_list .= '</select>';
                    }
                    //} else {
                    //$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
                    //}
                    echo $menu_list;
                    ?>
                </nav><!-- main_nav-end -->
            </div>
	</div>
    </div>
    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
            <div id="header_content">
                <div class="container">            
                    <div class="row">                
                        <div class="eightcol">
                            <div id="header_headline1" class="twelvecol">
                                <h1><?php echo simple_fields_get_post_value(get_the_id(), "headline", true);  ?></h1>
                            </div>
                            <div id="header_headline2" class="eightcol">
                                <?php echo strtoupper(simple_fields_get_post_value(get_the_id(), "headline_quote", true));  ?>
                            </div>
                            <div class="fourcol last">
                                <img class="arrow" src="<?= get_template_directory_uri(); ?>/images/arrow.png">
                            </div>
                        </div>
                        <div class="fourcol last">
                            <?php get_sidebar(); ?>
                        </div>                
                    </div>
                </div>
            </div>	
    <br class="clear">
</header>

<div id="middle">
    <br class="clear">
            <div class="container">
                <div class="row">
                    <div id="homepage_p" class="eightcol">
                        <br class="clear">
                        <div class="twelvecol">    
                            <div class="sixcol">
                                <p><?php the_content();  //the_content_rss(' ', 'false', ' ', 50); ?></p>
                            </div>
                            <div class="fivecol">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="onecol last"></div>    
                        </div>
                         <br class="clear"><div class="ln"></div>
                    <?php endwhile; ?>
                <!-- ***************** Testimonials ***************** -->
                <?php
                $args = array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 1
                );
                $tsmn = new WP_Query($args);
                if ($tsmn->have_posts()) {
                    while ($tsmn->have_posts()) {
                        $tsmn->the_post();
                        ?>        
                       
                        <div class="twelvecol">
                            <div class="threecol doctor_quote">
                                <?php the_post_thumbnail('thumbnail'); ?>
                                <?php //echo wp_get_attachment_image(simple_fields_get_post_value(get_the_id(), "quote_by_image", true), "thumbnail"); ?>
                            </div>
                            <div class="eightcol doctor_quote">
                                <span><?php the_content(); //echo simple_fields_get_post_value(get_the_id(), "quote", true);  ?></span>
                                <p>- <?php the_title(); //echo simple_fields_get_post_value(get_the_id(), "quote_by", true);  ?></p>
                            </div>
                            <div class="onecol last">
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    //echo 'Oh ohm no products!';
                }
                ?>

            </div>

            <div class="fourcol last">             
                &nbsp;
                </form> 
            </div>

        </div>
        <div class="fourcol last">
                            <?php //get_sidebar(); ?>
          </div>

    </div>
</div>	

<!-- ***************** RECENT POSTS ***************** -->

<div id="recent_posts">
    <div class="container">

        <?php $i = 1; ?>

        <?php
        $args = array(
            'posts_per_page' => 5,
            'category_name' => 'blogs'
        );
        query_posts($args);
        ?>
        <div class="row">
            <?php if (have_posts()) while (have_posts()) : the_post(); ?>
                    <?php
                    if ($i == 5)
                        $lst = 'last';
                    else
                        $lst = '';
                    ?>
                    <?php if ($i == 1) { ?>                        
                        <div class="most_recent_one">
                            <div class="sixcol"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a></div>
                            <div class="sixcol last">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <p><?php the_content_rss(' ', 'false', ' ', 50); //the_content();    ?></p>
                            </div>                    
                        </div>
                    <br class="clear">
                    <?php } ?>
                    <?php if ($i > 1) { ?>                                            

                        <div class="threecol <?php echo $lst; ?> most_recent_other">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <p><?php the_content_rss(' ', 'false', ' ', 50); //the_content();    ?></p>
                        </div>                            
                    <?php } ?>                                                

                    <?php $i++; ?>
                <?php endwhile; ?>                              
        </div>        
    </div>    
</div>

    <?php get_footer(); ?>