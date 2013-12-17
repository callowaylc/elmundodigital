<?php if (intval(get_option('of_ln_postmedia_nr')) > 0 ) { ?>
	<div id="mediabar">
		<div id="previous_button"></div>
		<div id="next_button"></div>

		<div class="container">
			<ul>
				<?php 
				$count=1;
				$args = array(
				  'posts_per_page' => get_option('of_ln_postmedia_nr'),
				  'cat' => get_option('of_ln_cat_media')
				);						
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>	
				<li class="car">
					<div class="thumb">		
						<?php 
						gab_media(array(
							'name' => 'line-slider',
							'enable_video' => 'true', 
							'video_id' => 'mediabar', 
							'enable_thumb' => 'true', 
							'catch_image' => 'true',
							'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
							'media_width' => '130', 
							'media_height' => '120', 
							'thumb_align' => 'alignnone', 
							'enable_default' => get_option('of_ln_enfea6'),
							'default_name' => 'p_gallery.jpg'
							)); 
						?>
					</div>
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			
				</li>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</ul>
		</div>
	</div><!-- end of Mediabar -->

	<script type="text/javascript">
		(function($) { $(document).ready(function(){
			$("#mediabar .container").jCarouselLite({
				<?php if(get_option('of_ln_media_rotate') == 'true'){ ?>
					auto:<?php if ( get_option('of_ln_media_pause') <> "" ) { echo get_option('of_ln_media_pause').'000'; } else { echo '5000'; } ?>,
				<?php } ?>
				scroll: <?php if ( get_option('of_ln_media_scroll') <> "" ) { echo get_option('of_ln_media_scroll'); } else { echo '2'; } ?>,
				speed: <?php if ( get_option('of_ln_media_speed') <> "" ) { echo get_option('of_ln_media_speed').'000'; } else { echo '1000'; } ?>,	
				visible: 4,
				start: 0,
				circular: false,
				btnPrev: "#previous_button",
				btnNext: "#next_button"
			});
		})})(jQuery)	
	</script>
<?php } ?>