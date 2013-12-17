<div id="primary_bottom" class="border_bottom_20">	
	<?php dynamic_sidebar('PrimaryBottom1');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">PrimaryBottom1</span>'; } ?>
	<div id="primary_bottomleft" class="border_right_20">
		<?php dynamic_sidebar('PrimaryBottomLeft1');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomLeft1</span>'; } ?>
		<?php 
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'posts_per_page' =>  get_option('of_ln_nr_belowps'),
		  'cat' => get_option('of_ln_cat_belowps')
		);
		$count = 1;
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();
		?>
			<div class="featuredPost<?php if ($count == get_option('of_ln_nr_belowps')) { echo " lastPost"; } ?>">						
				<h2 class="posttitle">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
				</h2>
						
				<p>	
					<?php 
						gab_media(array(
							'name' => 'line-b_slider',
							'enable_video' => 'false',
							'catch_image' => get_option('of_ln_catch_img'),
							'enable_thumb' => 'true',
							'resize_type' => 'c', 
							'media_width' => '120', 
							'media_height' => '90', 
							'thumb_align' => 'alignleft', 
							'enable_default' => get_option('of_ln_enfea7'),
							'default_name' => 'below_fea_left.jpg'	
						)); 
					?>
						
					<?php if(get_option('of_ln_post_author') == 'true') { ?>
						<span class="author"><?php the_author_posts_link(); ?> | </span> 
					<?php } ?>
					<?php echo string_limit_words(get_the_excerpt(), 20); ?>&hellip;
				</p>
							
				<div class="clear"></div>

				<span class="postmeta">
					<?php echo get_the_date(''); ?> / 
					<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
					<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
					<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
				</span>			
								
			</div>
		<?php $count++; endwhile; wp_reset_query(); ?>
		<?php dynamic_sidebar('PrimaryBottomLeft2');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomLeft2</span>'; } ?>
	</div>
	
	<div id="primary_bottomright">
		<?php dynamic_sidebar('PrimaryBottomRight1');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomRight1</span>'; } ?>
		<?php 
		if ( get_option('of_ln_homecontent_ad') <> "" ) {
			echo '<div class="widget">';
				include_once(TEMPLATEPATH . '/ads/home_content_300x250.php');
			echo '</div>';
		}
		?>

		<?php if (intval(get_option('of_ln_nr_video')) > 0 ) { ?>
			<div id="video-slider" class="sliderwrapper">
				<div id="featuredVideoNav">
					<div id="paginate-video-slider"></div>
					<span class="featuredVideoViewAll"><a href="<?php echo get_category_link(get_option('of_ln_cat_video'));?>"><?php _e('VIEW ALL','linepress'); ?></a></span>
					<div class="clear"></div>
				</div>
					<?php 
					$count = 1;
					$args = array(
					  'post__not_in'=>$do_not_duplicate,
					  'posts_per_page' => get_option('of_ln_nr_video'), 
					  'cat' => get_option('of_ln_cat_video')
					);
					
					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();						
					?>
					<div class="contentdiv">
						<?php 
							gab_media(array(
							'name' => 'line-mid',
							'enable_video' => 'true',
							'video_id' => 'featured', /* if video enabled, give a unique id to prevent duplicate id issue when post nwsps up twice on homepage */
							'catch_image' => get_option('of_ln_catch_img'),
							'enable_thumb' => 'true',
							'resize_type' => 'c', /* c = crop, h = resize only height, w = resize only width */
							'media_width' => '280', 
							'media_height' => '200', 
							'thumb_align' => 'alignnone', 
							'enable_default' => 'false'
							)); 
						?>
					</div>
					<?php $count++; endwhile; wp_reset_query(); ?>
					<script type="text/javascript">
						featuredcontentslider.init({
							id: "video-slider", //id of main slider DIV
							contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
							toc: ["&#149;", "&#149;", "&#149;", "&#149;", "&#149;"], //Valid values: "#increment", "markup", ["label1", "label2", etc]
							nextprev: ["", ""], //labels for "prev" and "next" links. Set to "" to hide.
							revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
							enablefade: [true, 0.4], //[true/false, fadedegree]
							autorotate: ["false", "5000"], //[true/false, pausetime]
							onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
								//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
								//curindex holds index of currently nwspn slide (1=1st slide, 2nd=2nd etc)
							}
						})
					</script>
				</div>
			<?php } ?>
			<?php dynamic_sidebar('PrimaryBottomRight2');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomRight2</span>'; } ?>
		</div><!-- primary_bottomright -->
	<div class="clear"></div>
	<?php dynamic_sidebar('PrimaryBottom2');  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">PrimaryBottom2</span>'; } ?>
</div><!-- primary_bottom -->