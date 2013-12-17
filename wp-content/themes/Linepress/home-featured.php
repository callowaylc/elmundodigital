<?php if(intval(get_option('of_ln_fea_nr_a') + get_option('of_ln_fea_nr_b') + get_option('of_ln_post_count1')) > 0 ) { ?>

<div id="featured">
	<?php dynamic_sidebar('Featured1');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Featured1</span>'; } ?>
		
	<div id="featured_left" class="border_right_15">
		<?php 
		$count = 1;
		$numberofposts = get_option('of_ln_fea_nr_a') + get_option('of_ln_fea_nr_b');

		if ( get_option('of_ln_fea_recent') == 'true' ) {
			$args = array(
			   'post__not_in'=>$do_not_duplicate,
			   'posts_per_page' => $numberofposts
			);
		} else {
			if ( get_option('of_ln_fea_tag') <> "" ) {
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => $numberofposts, 
				  'tag' => get_option('of_ln_fea_tag')
				);
			} else {
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => $numberofposts, 
				  'cat' => get_option('of_ln_fea_cat')
				);				
			}
		}
						
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();						
		$do_not_duplicate[] = $post->ID
		?>

			<div class="featuredPost<?php if ($count == $numberofposts) { echo " lastPost"; } ?>">
				<?php 
					if ($count <= get_option('of_ln_fea_nr_a')) { 
						gab_media(array(
							'name' => 'line-fea',
							'enable_video' => 'true',
							'video_id' => 'featured', /* if video enabled, give a unique id to prevent duplicate id issue when post nwsps up twice on homepage */
							'catch_image' => get_option('of_ln_catch_img'),
							'enable_thumb' => 'true',
							'resize_type' => 'c', /* c = crop, h = resize only height, w = resize only width */
							'media_width' => '405', 
							'media_height' => '250', 
							'thumb_align' => 'aligncenter', 
							'enable_default' => get_option('of_ln_enfea5'),
							'default_name' => 'featured.jpg'
						)); 
					}
				?>
							
				<h2 class="posttitle">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
				</h2>
								
				<p>
					<?php if(get_option('of_ln_post_author') == 'true') { ?>
						<span class="author"><?php the_author_posts_link(); ?> | </span> 
					<?php } ?>				
					<?php print string_limit_words(get_the_excerpt(), 24); ?>&hellip;
				</p>
									
				<span class="postmeta">
					<?php echo get_the_date(''); ?> / 
					<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
					<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
					<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
				</span>
			</div><!-- end of featuredPost -->
		<?php $count++; endwhile; wp_reset_query(); ?>
	</div><!-- end of #featured_left -->
					
	<div id="featured_right">
		<!-- Entries on middle column on the right side of Featured section -->				
		<?php 
		$count = 1; 
		if ( get_option('of_ln_fea_recent') == 'true' ) {
			$args = array(
			   'post__not_in'=>$do_not_duplicate,
			   'posts_per_page' => get_option('of_ln_post_count1')
			);
		} else {
			if ( get_option('of_ln_fea_tag') <> "" ) {
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count1'),
				  'tag' => get_option('of_ln_fea_tag')
				);
			} else {
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count1'),
				  'cat' => get_option('of_ln_fea_cat')
				);				
			}
		}
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();
		$do_not_duplicate[] = $post->ID
		?>
			<div class="featuredPost<?php if ($count == get_option('of_ln_post_count1')) { echo " lastPost"; } ?>">
				<h2 class="posttitle">
					<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<p>
					<?php if(get_option('of_ln_post_author') == 'true') { ?>
						<span class="author"><?php the_author_posts_link(); ?> | </span> 
					<?php } ?>					
					<?php print string_limit_words(get_the_excerpt(), 15); ?>&hellip;<?php edit_post_link(' #',' / ',''); ?>
				</p>
				<span class="postmeta">
					<?php echo get_the_date(''); ?> / 
					<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
					<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('More','linepress'); ?></a>
					
				</span>
			</div>
		<?php $count++; endwhile; wp_reset_query(); ?>
		<!-- End of entries on middle column on the right side of Featured section -->
	</div><!-- End of featured_right -->
	<div class="clear"></div>
	
	<?php dynamic_sidebar('Featured2');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Featured2</span>'; } ?>
</div><!-- End of featured -->

<?php } ?>