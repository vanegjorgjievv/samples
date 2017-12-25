<?php
/**
 * Template Name: Template Music
 *
 * This is the template that displays full width page without sidebar with category list items left
 *
 * @package maison
 */

get_header(); 
$current_user = wp_get_current_user(); ?>
<style>
.page_content, .page_content.custom-background, .page_content  { 
	background-color: #B23000 !important;
}
body{
	background-color: #B23000 !important; 
}
.nav-tabs a{
	color:black !important;
	padding: 10px 10px !important;
}
.post-inner-content{
	padding-top:20px !important;
	padding-bottom:0px !important;	
}
.music-content{
	background-color:#383838; 
	min-height:600px;
	background-image: url('<?php echo esc_url( home_url( '/' ) ); ?>wp-includes/images/disques.png');
	background-repeat: no-repeat; 
	background-position: center top; 
	background-size: 100% 
}
h1, h2, h3, h4, h5, h6{
	color:white !important;
}
.scrtabs-tab-scroll-arrow{
	background-color:white !important;
}

@media (min-width: 768px) {
	.music-content{
		padding: 20px 10px; 
	}
}

@media (max-width: 767px) {
	.music-content{
		background-color:#383838; 
		background-position: center top; 
		padding: 20px 0px; 
	}
	.col-sm-9{
		padding:0px !important;
	}
	
}

</style>
<div id="content" class="site-content custom-background ">
	<div class="container page_content main-content-area content-music">
	<?php $layout_class = get_layout_class(); ?>
	<div class="row <?php echo $layout_class; ?>">
  <div class="main-content-inner <?php echo sparkling_main_content_bootstrap_classes(); ?>">
  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

      <?php endwhile; ?>
	  
	  <?php  $title =  strtolower(get_the_title());?>

<?php wp_reset_postdata(); ?>
<div class="post-inner-content" style="margin-top: 0px; padding-top:20px;">
	<div class="col-sm-4 cat-list" style="overflow: auto; overflow-x: hidden; height:570px !important; display:none;" >		
	 <h3 class="entry-title" style="padding:1%;"><?php the_title(); ?></h3>
		<div class="feautured-box">
			<?php  
			$args = array( category_name => $title, cat => 24,  'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'numberposts' => 1000, ); 
			$postslist = get_posts( $args );    
			foreach ($postslist as $post) : 
			?>  
			<?php  $excerpt = ''; if (has_excerpt()) $excerpt = wp_strip_all_tags(get_the_excerpt()); ?>
			<h4><a class="feautured" href="<?php echo get_site_url()."/".$title."/?t=".get_the_ID(); ?>"> <?php the_title();  ?></a> <span class="weak"><?php echo strip_tags($excerpt); ?>
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
			</span></h4>  <?php //the_permalink(); ?>  
			<?php if(!isset($sticky_id)){ $sticky_id = get_the_ID();} ?>
			<?php endforeach; ?> 
		</div>	
			
			<?php //all the rest posts per category 'lang' => 'fr',
			$args = array( category_name => $title,  cat => -24,  'post_type' => 'post', 'orderby' => 'date', 'order' => 'ASC', 'numberposts' => 1000, );  
			$postslist = get_posts( $args );    
			foreach ($postslist as $post) :  
			?>  
			<?php  $excerpt = ''; if (has_excerpt()) $excerpt = wp_strip_all_tags(get_the_excerpt()); ?>
			<h4><a href="<?php echo get_site_url()."/".$title."/?t=".get_the_ID(); ?>"> <?php the_title();  ?></a> <span class="weak"><?php echo strip_tags($excerpt); ?>
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
	
	<div class="col-sm-12 main-right-content" style="display:block;">
	<ul class="nav nav-tabs" role="tablist">
  
	  <?php 
			$args = array( category_name => $title,  cat => -24,  'post_type' => 'post', 'orderby' => 'date', 'order' => 'ASC', 'numberposts' => 1000, );  
			$postslist = get_posts( $args ); 
			$i=1; $active = true;				
			$colors = array('#e6194b' ,'#3cb44b', '#ffe119', '#0082c8', '#f58231', '#911eb4', '#46f0f0', '#f032e6' ,'#d2f53c' ,'#fabebe' ,'#008080' ,'#e6beff' ,'#aa6e28' ,'#fffac8' ,'#800000' ,'#aaffc3' ,'#808000' ,'#ffd8b1' ,'#000080');
			$chosen=array();
			foreach ($postslist as $post): 
			?>  
			<li class="<?php if($active){$active=false; echo 'active';} ?>" role="presentation"><a style="background-color:<?php shuffle($colors); $temp = array_pop($colors); echo $temp; array_push($chosen, $temp);?>;" class="music-tab" href="#tab<? echo $i; $i+=1;?>" role="tab" data-toggle="tab" ><?php the_title();  ?> </a></li>

			<?php endforeach; ?> 
	  
    </ul>

    <!-- Tab panes -->
    <div class="tab-content"> 
		<?php 
			$args = array( category_name => $title,  cat => -24,  'post_type' => 'post', 'orderby' => 'date', 'order' => 'ASC', 'numberposts' => 1000, );  
			$postslist = get_posts( $args );    
			$i=1; $active = true; $chosen = array_reverse($chosen);	 
			foreach ($postslist as $post) : 
				
			?>  
	<div role="tabpanel" class="tab-pane <?php if($active){$active=false; echo 'active';} ?>" id="tab<? echo $i; $i+=1; ?>" style="overflow:hidden; padding: 10px 10px 0px 10px; background-color:<?php echo array_pop($chosen) ?>; color:white;">
			<div class="col-sm-12 music-content" style="" >
				<div class="col-sm-9" >
					<?php 
					$post_id = get_the_ID();
					$post = wp_get_single_post( $post_id ); 
					setup_postdata( $post );
					
					the_content(); ?>
				</div>
				<div class="col-sm-3 music_sidebar" >
					MUSIC SIDEBAR
				</div>
			</div>
		</div>	
	
		<?php endforeach; ?> 
    </div>
	
	
	
	</div>
	<div id="music_sidebar_content" style="display:none;">
	<?php 
					$post_id = "528";
					$post = wp_get_single_post( $post_id ); 
					setup_postdata( $post );
					
					the_content(); ?>
	</div>
	
	<div class="col-sm-8 main-right-content" style="overflow: auto; overflow-x: hidden; height:570px !important; display:none;">
		<div class="col-sm-12">
			<div class="row normal-lang"> 
				<div id="langselect">
					<select id="language" class="language">
						<option value="en">English</option>
						<option value="fi">Suomi</option>
						<option value="fr">Français</option>
					</select>
				</div>
			</div>
			
			<div id="main-content"  class="row">
			<?php 
				$id = (int)$_GET['t']; 
				if(!empty($id) && is_integer($id) ){
					$post = wp_get_single_post( $id ); 
					setup_postdata( $post );
					$post_title = $post->post_title;
					
				}else{
					$post = wp_get_single_post( $sticky_id ); 
					setup_postdata( $post );
					$post_title = $post->post_title;
				}
				?>
	
				
				<?php 
					
					the_content();
			?>
			
			</div>
		</div>
	
	</div>
	<div style="clear: both;"></div>
</div>

    </main><!-- #main -->

  </div><!-- #primary -->
  
<?php get_footer(); ?>
