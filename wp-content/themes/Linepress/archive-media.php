<div class="post" id="media_cat">
	<?php 
	$count = 1;
	if (have_posts()) : while (have_posts()) : the_post();			
	$gab_thumb = get_post_meta($post->ID, 'thumbnail', true);
	$gab_video = get_post_meta($post->ID, 'video', true);
	$gab_flv = get_post_meta($post->ID, 'videoflv', true);
	$ad_flv = get_post_meta($post->ID, 'adflv', true);
	$gab_iframe = get_post_meta($post->ID, 'iframe', TRUE);	
	 ?>
		<div id="post-<?php the_ID(); ?>" class="snapshot<?php if($count % 2 == 0) { echo ' last'; } ?>" onmouseover="this.className='snapshot2<?php if($count % 2 == 0) { echo ' last'; } ?>'" onmouseout="this.className='snapshot<?php if($count % 2 == 0) { echo ' last'; } ?>'">
				
			<h2 class="media_postTitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<a href="<?php the_permalink() ?>">
				<?php 
				gab_media(array(
					'name' => 'line-arc_media',
					'enable_video' => 'true',
					'enable_thumb' => 'true',
					'catch_image' => get_option('show_catch_img'),
					'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
					'media_width' => '294', 
					'media_height' => '180', 
					'thumb_align' => 'media', 
					'enable_default' => get_option('of_ln_enfea10'),
					'default_name' => 'archive_media.jpg'
					)); 
				?>
			</a>
				
			<span class="entryDate"><?php echo get_the_date(''); ?></span>
			
			<span class="entryComment"><?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?></span>
		</div>
			
		<?php if($count % 2 == 0) { echo '<div class="clear"></div>'; } ?>
	<?php $count++; endwhile; else : endif; ?>	
	<div class="clear"></div>	
</div>


