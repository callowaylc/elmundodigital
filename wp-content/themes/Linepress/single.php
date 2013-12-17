<?php get_header(); ?>
	<div id="container">	
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
		
			<h1 class="entry_title"><?php the_title(); ?></h1>

			<div class="metasingle">
				<span class="postDate"><?php echo get_the_date('') ?> | </span>
				<span class="postCategory"><?php _e('Filed under','linepress'); ?>: <?php the_category(',') ?> | </span>
				<span class="postAuthor"><?php _e('Posted by','linepress'); ?>: <?php the_author_posts_link(); ?></span> 
			</div><!-- /metas -->
			
			<?php 
				// Theme innerpage slider
				if (get_option('of_ln_inslider') == 'Site Wide') {
					require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
				} 
				elseif (get_option('of_ln_inslider') == 'Tag-based' && has_tag(get_option('of_ln_inslider_tag')) ) {
					require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
				}
				elseif (get_option('of_ln_inslider') == 'Disable') {
					// do nothing
				}

				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','linepress'),'<p>','</p>'); 				
				
				// If there is a video, display it
				gab_media(array(
					'name' => 'gab_featured',
					'enable_video' => 'true',
					'video_id' => 'post',
					'catch_image' => 'false',
					'enable_thumb' => 'false',
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
				
				//If enabled -> display short url of post
				if(get_option('of_short_url') == 'true') {
					echo '<p class="small_text">';
						_e('Shortlink: ','linepress'); 
						echo '<input type="text" class="small_text span-1" onclick="this.focus(); this.select();" value="'; echo home_url('/?p=') . $post->ID; 
						echo '">';
					echo '</p>';
				}				
				
				//If there is a widget, display it
				dynamic_sidebar('PostWidget');
			
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','linepress'),'<p>','</p>'); 
			?>		
			
			<?php if(get_option('of_ln_entry_meta') == 'true')  { ?>
				<div id="entryMeta">
					<?php echo get_avatar( get_the_author_email(), '27' ); ?>
					<?php _e('Posted by','linepress'); ?>  <?php the_author_posts_link(); ?> 
					<?php /* This is commented, because it requires a little adjusting sometimes.
						You'll need to download this plugin, and follow the instructions:
						http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
						/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
					<?php _e('on','linepress'); ?> <?php echo get_the_date(''); ?>. <?php _e('Filed under','linepress'); ?> <?php the_category(', ') ?>.
					<?php _e('You can follow any responses to this entry through the','linepress'); ?> <?php comments_rss_link('RSS 2.0'); ?>.
					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Both Comments and Pings are open ?>
					<?php _e('You can leave a response or trackback to this entry','linepress'); ?>
					<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Only Pings are Open ?>
					<?php _e('Responses are currently closed, but you can trackback from your own site.','linepress'); ?>
					<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Comments are open, Pings are not ?>
					<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','linepress'); ?>
					<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Neither Comments, nor Pings are open ?>
					<?php _e('Both comments and pings are currently closed.','linepress'); ?>
					<?php } ?>	
					<div class="clear"></div>	
				</div>
			<?php } ?>
		
			<?php endwhile; else : endif; ?>
		</div><!-- /post -->
		
		<?php if ( get_option('of_ln_singlepage') <> "" ) {  ?>
		<div class="single_ad">
				<?php
					if(file_exists(TEMPLATEPATH . '/ads/single_468x60/'.current_catID().'.php') && (is_single() || is_category())) {
						include_once(TEMPLATEPATH . '/ads/single_468x60/'.current_catID().'.php');
					}
					else {
						include_once(TEMPLATEPATH . '/ads/single_468x60.php');
					}
				?>
		</div>
		<?php } ?>

		<?php comments_template(); ?>
	</div><!-- /container -->
	

	<div id="sidebar">
		<?php get_sidebar(); ?> 
	</div><!-- End of sidebar -->

	<div class="clear"></div>

<?php get_footer(); ?>