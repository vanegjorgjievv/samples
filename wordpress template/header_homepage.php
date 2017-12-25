<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|', true, 'right');?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]>
            <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
            <script> document.createElement("header"); </script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        
        <!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/1140.css" type="text/css" media="screen" />
	
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        
        <!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
        <script async="async" type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/css3-mediaqueries.js"></script>
        <script async="async" type="text/javascript" src="<?= get_template_directory_uri(); ?>/js/jquery.backgroundSize.js"></script>
        
        <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
        ?>

	
</head>
<body>

