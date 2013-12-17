<div class="post" id="media_cat">
	<?php 
	$count = 1;
	if (have_posts()) : while (have_posts()) : the_post();			
	$gab_video = get_post_meta($post->ID, 'video', TRUE); /* Custom field video check */
	$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE); /* Custom field thumbnail check */
	$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */			
	 ?>
		<div id="post-<?php the_ID(); ?>" class="snapshot<?php if($count % 2 == 0) { echo ' last'; } ?>" onmouseover="this.className='snapshot2<?php if($count % 2 == 0) { echo ' last'; } ?>'" onmouseout="this.className='snapshot<?php if($count % 2 == 0) { echo ' last'; } ?>'">
				
			<h2 class="media_postTitle"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				

			<a href="<?php the_permalink() ?>">
				<?php 
				gab_media(array(
					'name' => 'gab_featured2',
					'enable_video' => 'true',
					'enable_thumb' => 'true',
					'catch_image' => get_option('show_catch_img'),
					'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
					'media_width' => '299', 
					'media_height' => '180', 
					'thumb_align' => 'media', 
					'enable_default' => 'true',
					'default_name' => 'gab_featured2.jpg'
					)); 
				?>
			</a>
				
			<span class="entryDate"><?php echo get_the_date(''); ?></span>
			
			<span class="entryComment"><?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?></span>
		</div>
			
		<?php if($count % 2 == 0) { echo '<div class="clear"></div>'; } ?>
	<?php $count++; endwhile; else : endif; ?>	
	<div class="clear"></div>	
</div>


