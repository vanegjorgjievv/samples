<?php
/**
 * Template Name: Template Lecture
 *
 * This is the template that displays full width page without sidebar with category list items left
 *
 * @package maison
 */
if ( $_GET["header"] == '1' ) :
    get_header( 's1' );
elseif ( $_GET["header"] == '2' ) :
    get_header( 's2' );
else :
    get_header();
endif;
$current_user = wp_get_current_user();
?>
<div id="content" class="site-content custom-background ">

	<div class="container page_content main-content-area">
		<?php $layout_class = get_layout_class(); ?>
	<div class="row <?php echo $layout_class; ?>">
   <div class="main-content-inner">
  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

      <?php endwhile; // end of the loop. ?>
	  
	  <?php  $title =  strtolower(get_the_title());?>

<?php wp_reset_postdata(); ?>
<div class="post-inner-content" style="margin-top: 0px; padding-top:20px;">
	<div class="col-sm-4 cat-list" style="overflow: auto; overflow-x: hidden; height:100% !important;" >		
	 <h3 class="entry-title" style="padding:1%;"><?php the_title(); ?></h3>
		<div class="feautured-box">
			<?php  
			$args = array( category_name => $title, cat => 24,  'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'numberposts' => 1000, ); 
			$postslist = get_posts( $args );    
			foreach ($postslist as $post) : 
			?>  
			<?php  $excerpt = ''; if (has_excerpt()) $excerpt = wp_strip_all_tags(get_the_excerpt()); ?>
			<h4><a class="feautured" href="<?php echo get_site_url()."/".$title."/?t=".get_the_ID(); ?>"> <?php the_title();  ?></a> <span class="weak lecturemore"><?php echo strip_tags($excerpt); ?>
				<?php if (user_can( $current_user, 'administrator' ) || user_can( $current_user, 'editor' ) ) { 
					$c = apply_filters( 'the_content', get_the_content() );
					?>&nbsp; - <?php
					if (strpos($c, 'lang-fi') !== false) { ?>
						&nbsp;<div style = "display:inline-block;" class="post-edit-link fi-flag"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-includes/images/flag-fi.png" width="20" height="20" ></div>
					<?php }
					if (strpos($c, 'lang-fr') !== false) { ?>
						<div style="display:inline-block;" class = "post-edit-link fr-flag"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-includes/images/flag-fr.png" width="20" height="20" >&nbsp;</div>
					<?php } ?>
					<?php edit_post_link('Edit'); ?>
				<?php } ?> 				
			</span></h4> 
			<?php if(!isset($sticky_id)){ $sticky_id = get_the_ID();} ?>
			<?php endforeach; ?> 
		</div>	
			
			<?php
			$args = array( category_name => $title,  cat => -24,  'post_type' => 'post', 'orderby' => 'date', 'order' => 'ASC', 'numberposts' => 1000, );  
			$postslist = get_posts( $args );    
			foreach ($postslist as $post) :  
			?>  
			<?php  $excerpt = ''; if (has_excerpt()) $excerpt = wp_strip_all_tags(get_the_excerpt()); ?>
			<h4><a href="<?php echo get_site_url()."/".$title."/?t=".get_the_ID(); ?>"> <?php the_title();  ?></a> <span class="weak lecturemore"><?php echo strip_tags($excerpt); ?>
				<?php if (user_can( $current_user, 'administrator' ) || user_can( $current_user, 'editor' ) ) { 
					$c = apply_filters( 'the_content', get_the_content() ); 
					?>&nbsp; - <?php
					if (strpos($c, 'lang-fi') !== false) { ?>
						&nbsp;<div style = "display:inline-block;" class="post-edit-link fi-flag"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-includes/images/flag-fi.png" width="20" height="20" ></div>
					<?php }
					if (strpos($c, 'lang-fr') !== false) { ?>
						<div style="display:inline-block;" class = "post-edit-link fr-flag"> <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-includes/images/flag-fr.png" width="20" height="20" >&nbsp;</div>
					<?php } ?>
					<?php edit_post_link('Edit'); ?>
				<?php } ?> 
			</span> </h4>  <?php //the_permalink(); ?>  
			<?php if(!isset($sticky_id)){ $sticky_id = get_the_ID();} ?>
			<?php endforeach; ?> 
	</div>
	
	<div class="col-sm-8 main-right-content lecture_right" style="overflow: auto; overflow-x: hidden; height:100% !important;">
		<div class="col-sm-12">
	
			<div id="main-content"  class="row">
			<?php 
				$id = (int)$_GET['t']; 
				if(!empty($id) && is_integer($id) ){
					$post = wp_get_single_post( $id ); 
					setup_postdata( $post );
					$post_title = $post->post_title;
					//var_dump($main_post);
				}else{
					$post = wp_get_single_post( $sticky_id ); 
					setup_postdata( $post );
					$post_title = $post->post_title;
				}
				?>
			<h1 class="entry-title "><?php the_title(); ?></h1>
				
				<?php 
					
					the_content();
					
			?>
				
					
			</div>
		</div>
	
	</div>
	<div style="clear: both;">
		
	</div>
</div>

    </main><!-- #main -->

  </div><!-- #primary -->
  
<?php get_footer(); ?>
