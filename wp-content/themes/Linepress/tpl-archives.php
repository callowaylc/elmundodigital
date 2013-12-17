<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
	<div id="container">	
	
		<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
			<h1 class="entry_title"><?php the_title(); ?></h1>

			<?php 
				// Display edit post link to site admin
				edit_post_link('Edit This Post','<p>','</p>'); 
				
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
				
				// end query
				endwhile; else : endif; 
		
			   // This is where loop for archives list starts
				$cats = get_categories();
				foreach ($cats as $cat) {
				query_posts('cat='.$cat->cat_ID);
				?>
					<div class="widget">
					<h4><?php echo $cat->cat_name; ?></h4>
					<ul>	
						<?php while (have_posts()) : the_post(); ?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - (<?php echo $post->comment_count ?>)</li>
						<?php endwhile;  ?>
					</ul>
					</div>
				<?php }
				edit_post_link(__('Edit This Post','linepress'),'<p>','</p>'); 
			?>
		</div><!-- /post -->
		
		
	</div><!-- /container -->
	

	<div id="sidebar">
		<?php get_sidebar(); ?> 
	</div><!-- End of sidebar -->

	<div class="clear"></div>

<?php get_footer(); ?>