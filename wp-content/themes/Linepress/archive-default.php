<?php 
$count = 1;
if (have_posts()) : while (have_posts()) : the_post();			
$gab_thumb = get_post_meta($post->ID, 'thumbnail', true);
$gab_video = get_post_meta($post->ID, 'video', true);
$gab_flv = get_post_meta($post->ID, 'videoflv', true);
$ad_flv = get_post_meta($post->ID, 'adflv', true);
$gab_iframe = get_post_meta($post->ID, 'iframe', true);

if(($count == 1) and !is_paged()) { ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('entry');?>>
	
		<?php
			gab_media(array(
				'name' => 'line-mid',
				'enable_video' => 'true',
				'video_id' => 'archive',
				'catch_image' => get_option('of_ln_catch_img'),
				'enable_thumb' => 'true',
				'resize_type' => 'c',
				'media_width' => '280', 
				'media_height' => '200', 
				'thumb_align' => 'alignleft',  /* post media will be wrapped with a span that is assigned with "thumb" class */
				'enable_default' => 'false',
				'default_name' => 'archive_big.jpg'
			));
		?>
			
		<div class="postexcerpt">
			<h2 class="archiveTitle">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
			</h2>
			<?php the_excerpt(); ?>
			
			<span class="postmeta">
				<?php echo get_the_date(''); ?> / 
				<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
				<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
				<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
			</span>
		</div>			
		<div class="clear"></div>
	</div>
	
<?php } else { ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
		<div class="archive_postheader border_bottom_20">
			<h2 class="archiveTitle">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			
			<span class="entryDate"><?php echo get_the_date(''); ?></span>
			<span class="entryComment"><?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?></span>
			<div class="clear"></div>
		</div>
		
		<?php 
			if(($gab_flv !== '') or ($gab_video !== '') or ($gab_iframe !== ''))  {
				gab_media(array(
					'name' => 'line-archive', 
					'enable_video' => 'true', 
					'video_id' => 'archive', 
					'catch_image' => 'false',
					'enable_thumb' => 'false', 
					'thumb_align' => 'alignnone', 
					'catch_image' => 'false',
					'media_width' => '625',
					'media_height' => '360',
					'enable_default' => 'false',
				)); 
			} else {
				gab_media(array(
					'name' => 'line-archive',
					'enable_video' => 'true',
					'video_id' => 'archive',
					'catch_image' => get_option('of_ln_catch_img'),
					'enable_thumb' => 'true',
					'resize_type' => 'c',
					'media_width' => '190', 
					'media_height' => '110', 
					'thumb_align' => 'alignleft', 
					'enable_default' => 'false',
				)); 
			}
			the_excerpt();
		?>
		<div class="clear"></div>

		<span class="read_on">
			<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Continue reading &hellip;','linepress'); ?></a><?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
		</span>
	</div><!-- /cat_post -->
<?php } ?>	
<?php $count++; endwhile; else : ?>
<div class="post">
<h2 class="archiveTitle"><?php _e('Sorry, nothing matched your criteria','linepress');?></h2>
</div>
<?php endif; ?>