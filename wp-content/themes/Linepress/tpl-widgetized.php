<?php
/*
Template Name: Widgetized Page
*/
?>
<?php get_header(); ?>
	<div id="container">	
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
		
			<h1 class="entry_title"><?php the_title(); ?></h1>
			
			<?php 
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','linepress'),'<p>','</p>'); 
				
				// If there is a video, display it
				gab_media(array(
					'name' => 'gab_featured',
					'enable_video' => '1',
					'video_id' => 'page',
					'catch_image' => 'false',
					'enable_thumb' => '0',
					'media_width' => '625', 
					'media_height' => '360', 
					'thumb_align' => 'alignnone', 
					'enable_default' => 'false',
				)); 
				
				// Display content
				the_content();
				
				// make sure any floated content gets cleared
				echo '<div class="clear"></div>';
				
				// Display pagination
				wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %');
			
				// If there is a widget, display it
				dynamic_sidebar('PageWidget');
			
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','linepress'),'<p>','</p>'); 
			?>
			
			</div><!-- /post -->
		<?php endwhile; else : endif; ?>
		
	</div><!-- /container -->
	
	<div id="sidebar">
		<?php get_sidebar(); ?> 
	</div><!-- End of sidebar -->

	<div class="clear"></div>

<?php get_footer(); ?>