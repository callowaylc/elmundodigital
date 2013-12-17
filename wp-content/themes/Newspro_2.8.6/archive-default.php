<?php 
$count = 1;
if (have_posts()) : while (have_posts()) : the_post();			
$gab_thumb = get_post_meta($post->ID, 'thumbnail', true);
$gab_video = get_post_meta($post->ID, 'video', true);
$gab_flv = get_post_meta($post->ID, 'videoflv', true);
$ad_flv = get_post_meta($post->ID, 'adflv', true);
$gab_youtube = get_post_meta($post->ID, 'youtube', true);
$gab_vimeo = get_post_meta($post->ID, 'vimeo', true);	

if(($count == 1) and !is_paged()) { ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('archive_firstPost');?>>
		<?php
			gab_media(array(
				'name' => 'gab_featured',
				'enable_video' => 'true',
				'video_id' => 'archive',
				'catch_image' => get_option('of_nw_catch_img'),
				'enable_thumb' => 'true',
				'resize_type' => 'c',
				'media_width' => '320', 
				'media_height' => '200', 
				'thumb_align' => 'thumb',  /* post media will be wrapped with a span that is assigned with "thumb" class */
				'enable_default' => 'false',
			));
		?>
			
		<div class="text">
			<h2 class="archiveTitle">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
			</h2>
			<?php the_excerpt(); ?>
			
			<span class="postmeta">
				<?php echo get_the_date(''); ?> / 
				<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
				<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
				<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
			</span>
		</div>			
		<div class="clear"></div>
	</div>
	
<?php } else { ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
		<h2 class="archiveTitle"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php 
			if(($gab_flv !== '') or ($gab_video !== '') or ($gab_vimeo !== '') or ($gab_youtube !== '') )  {
				gab_media(array(
					'name' => 'gab_featured', 
					'enable_video' => 'true', 
					'video_id' => 'archive', 
					'catch_image' => 'false',
					'enable_thumb' => 'false', 
					'thumb_align' => 'alignnone', 
					'catch_image' => 'false',
					'media_width' => '640', 
					'media_height' => '360', 
					'enable_default' => 'false',
				)); 
			} else {
				gab_media(array(
					'name' => 'gab_featured',
					'enable_video' => 'true',
					'video_id' => 'archive',
					'catch_image' => get_option('of_nw_catch_img'),
					'enable_thumb' => 'true',
					'resize_type' => 'c',
					'media_width' => '140', 
					'media_height' => '78', 
					'thumb_align' => 'alignleft', 
					'enable_default' => 'false',
				)); 
			}
			the_excerpt();
		?>
		<div class="clear"></div>

		<p class="metas">
			<span class="postDate">
				<?php echo get_the_date() ?> | 
			</span> 
				
			<span class="postCategory">
				<?php _e('Filed under','newspro'); ?> <?php the_category(',') ?> | 
			</span> 
					
			<span class="postLink">
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More','newspro'); ?></a>
			</span>
			<?php edit_post_link(__('Edit This Post','newspro'),' | ',''); ?>
		</p>	
				
	</div><!-- /cat_post -->
<?php } ?>	
<?php $count++; endwhile; else : ?>
<div class="post">
<h2 class="archiveTitle"><?php _e('Sorry, nothing matched your criteria','newspro');?></h2>
</div>
<?php endif; ?>