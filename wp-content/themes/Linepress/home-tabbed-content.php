<?php dynamic_sidebar('TabbedSection1'); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">TabbedSection1</span>'; } ?>

<script type="text/javascript">
	(function($) { $(document).ready(function(){
		var tabContainers = $('div.tabcontent > div');
			tabContainers.hide().filter(':first').show();

			$('div.tabcontent ul.tabcontent_title a').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tabcontent ul.tabcontent_title a').removeClass('selected');
				$(this).addClass('selected');
			return false;
		}).filter(':first').click();
	})})(jQuery)
</script>

<div class="tabcontent" id="tabcontent">	
	<ul class="tabcontent_title" id="tabcontent_title">
		<li><a href="#priBotTab1" rel="nofollow"><?php if ( get_option('of_ln_tabname1')  <> "" ) { echo get_option('of_ln_tabname1'); } else { echo get_cat_name(get_option('of_ln_cat_tab1')); } ?></a></li>
		<li><a href="#priBotTab2" rel="nofollow"><?php if ( get_option('of_ln_tabname2')  <> "" ) { echo get_option('of_ln_tabname2'); } else { echo get_cat_name(get_option('of_ln_cat_tab2')); } ?></a></li>
		<li><a href="#priBotTab3" rel="nofollow"><?php if ( get_option('of_ln_tabname3')  <> "" ) { echo get_option('of_ln_tabname3'); } else { echo get_cat_name(get_option('of_ln_cat_tab3')); } ?></a></li>
		<li><a href="#priBotTab4" rel="nofollow"><?php if ( get_option('of_ln_tabname4')  <> "" ) { echo get_option('of_ln_tabname4'); } else { echo get_cat_name(get_option('of_ln_cat_tab4')); } ?></a></li>
		<li><a href="#priBotTab5" rel="nofollow"><?php if ( get_option('of_ln_tabname5')  <> "" ) { echo get_option('of_ln_tabname5'); } else { echo get_cat_name(get_option('of_ln_cat_tab5')); } ?></a></li>
	</ul>
	
	<!-- Tab 1 -->
	<div id="priBotTab1" class="tabcontent_body">
		
		<?php if ( ! dynamic_sidebar( 'Tab1' ) ) :  ?>
		
			<div class="tableft border_right_20">
				<?php 
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count_tab1a'),
				  'cat' => get_option('of_ln_cat_tab1')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == get_option('of_ln_post_count_tab1a')) { echo " lastPost"; } ?>">
						<?php 
							gab_media(array(
								'name' => 'line-tabs_big',
								'enable_video' => 'true',
								'video_id' => 'tab1', 
								'catch_image' => get_option('of_ln_catch_img'),
								'enable_thumb' => 'true',
								'resize_type' => 'c', 
								'media_width' => '300', 
								'media_height' => '225', 
								'thumb_align' => 'aligncenter', 
								'enable_default' => get_option('of_ln_enfea8'),
								'default_name' => 'tab_big.jpg'	
							)); 
						?>

						<h2 class="posttitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						</h2>

						<p>
							<?php if(get_option('of_ln_post_author') == 'true') { ?>
								<span class="author"><?php the_author_posts_link(); ?> | </span> 
							<?php } ?>						
							<?php echo string_limit_words(get_the_excerpt(), 45); ?>&hellip;
						</p>

						<span class="postmeta">
							<?php echo get_the_date(''); ?> / 
							<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
							<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
							<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tableft -->
			
			<div class="tabright">
				<?php 
				$numberofposts = get_option('of_ln_post_count_tab1b') + get_option('of_ln_post_count_tab1c');
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' =>  $numberofposts,
				  'offset' => get_option('of_ln_post_count_tab1a'),
				  'cat' => get_option('of_ln_cat_tab1')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == $numberofposts) { echo " lastPost"; } ?>">
							<?php if ($count <= get_option('of_ln_post_count_tab1b')) { ?>
							
							<h2 class="posttitle">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
							</h2>
							
							<p>	
								<?php 
									gab_media(array(
										'name' => 'line-tabs_small',
										'enable_video' => 'false',
										'catch_image' => get_option('of_ln_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '60', 
										'media_height' => '50', 
										'thumb_align' => 'alignright', 
										'enable_default' => get_option('of_ln_enfea9'),
										'default_name' => 'tab_small.jpg'	
									)); 
								?>
								<?php if(get_option('of_ln_post_author') == 'true') { ?>
									<span class="author"><?php the_author_posts_link(); ?> | </span> 
								<?php } ?>
								<?php echo string_limit_words(get_the_excerpt(), 15); ?>&hellip;
							</p>
							
							<div class="clear"></div>

							<span class="postmeta">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
								<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
								<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
							</span>			
							
						<?php } else { ?>
							<a class="list" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						<?php } ?>
						
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tabright -->
			<div class="clear"></div>
							
		<?php endif;  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Tab1</span>'; } ?>
	</div><!-- /priBotTab1 -->
		
	<!-- Tab 2 -->
	<div id="priBotTab2" class="tabcontent_body">
	
		<?php if ( ! dynamic_sidebar( 'Tab2' ) ) : ?>
			
			<div class="tableft border_right_20">
				<?php 
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count_tab2a'),
				  'cat' => get_option('of_ln_cat_tab2')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == get_option('of_ln_post_count_tab2a')) { echo " lastPost"; } ?>">
						<?php 
							gab_media(array(
								'name' => 'line-tabs_big',
								'enable_video' => 'true',
								'video_id' => 'tab2', 
								'catch_image' => get_option('of_ln_catch_img'),
								'enable_thumb' => 'true',
								'resize_type' => 'c', 
								'media_width' => '300', 
								'media_height' => '225', 
								'thumb_align' => 'aligncenter', 
								'enable_default' => get_option('of_ln_enfea8'),
								'default_name' => 'tab_big.jpg'	
							)); 
						?>
						
						<h2 class="posttitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						</h2>

						<p>
							<?php if(get_option('of_ln_post_author') == 'true') { ?>
								<span class="author"><?php the_author_posts_link(); ?> | </span> 
							<?php } ?>
							<?php echo string_limit_words(get_the_excerpt(), 45); ?>&hellip;
						</p>

						<span class="postmeta">
							<?php echo get_the_date(''); ?> / 
							<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
							<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
							<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tableft -->
			
			<div class="tabright">
				<?php 
				$numberofposts = get_option('of_ln_post_count_tab2b') + get_option('of_ln_post_count_tab2c');
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' =>  $numberofposts,
				  'offset' => get_option('of_ln_post_count_tab2a'),
				  'cat' => get_option('of_ln_cat_tab2')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == $numberofposts) { echo " lastPost"; } ?>">
							<?php if ($count <= get_option('of_ln_post_count_tab2b')) { ?>
							
							<h2 class="posttitle">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
							</h2>
							
							<p>	
								<?php 
									gab_media(array(
										'name' => 'line-tabs_small',
										'enable_video' => 'false',
										'catch_image' => get_option('of_ln_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '60', 
										'media_height' => '50', 
										'thumb_align' => 'alignright', 
										'enable_default' => get_option('of_ln_enfea9'),
										'default_name' => 'tab_small.jpg'	
									)); 
								?>
								<?php if(get_option('of_ln_post_author') == 'true') { ?>
									<span class="author"><?php the_author_posts_link(); ?> | </span> 
								<?php } ?>
								<?php echo string_limit_words(get_the_excerpt(), 15); ?>&hellip;
							</p>
							
							<div class="clear"></div>

							<span class="postmeta">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
								<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
								<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
							</span>			
							
						<?php } else { ?>
							<a class="list" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						<?php } ?>
						
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tabright -->
			<div class="clear"></div>
	
		<?php endif;  if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Tab2</span>'; } ?>
	</div><!-- /priBotTab2 -->
		
	<!-- Tab 3 -->
	<div id="priBotTab3" class="tabcontent_body">
	
		<?php if ( ! dynamic_sidebar( 'Tab3' ) ) :  ?>
		
			<div class="tableft border_right_20">
				<?php 
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count_tab3a'),
				  'cat' => get_option('of_ln_cat_tab3')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == get_option('of_ln_post_count_tab3a')) { echo " lastPost"; } ?>">
						<?php 
							gab_media(array(
								'name' => 'line-tabs_big',
								'enable_video' => 'true',
								'video_id' => 'tab3', 
								'catch_image' => get_option('of_ln_catch_img'),
								'enable_thumb' => 'true',
								'resize_type' => 'c', 
								'media_width' => '300', 
								'media_height' => '225', 
								'thumb_align' => 'aligncenter', 
								'enable_default' => get_option('of_ln_enfea8'),
								'default_name' => 'tab_big.jpg'	
							)); 
						?>

						<h2 class="posttitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						</h2>

						<p>
							<?php if(get_option('of_ln_post_author') == 'true') { ?>
								<span class="author"><?php the_author_posts_link(); ?> | </span> 
							<?php } ?>						
							<?php echo string_limit_words(get_the_excerpt(), 45); ?>&hellip;
						</p>

						<span class="postmeta">
							<?php echo get_the_date(''); ?> / 
							<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
							<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
							<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tableft -->
			
			<div class="tabright">
				<?php 
				$numberofposts = get_option('of_ln_post_count_tab3b') + get_option('of_ln_post_count_tab3c');
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' =>  $numberofposts,
				  'offset' => get_option('of_ln_post_count_tab3a'),
				  'cat' => get_option('of_ln_cat_tab3')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == $numberofposts) { echo " lastPost"; } ?>">
							<?php if ($count <= get_option('of_ln_post_count_tab3b')) { ?>
							
							<h2 class="posttitle">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
							</h2>
							
							<p>	
								<?php 
									gab_media(array(
										'name' => 'line-tabs_small',
										'enable_video' => 'false',
										'catch_image' => get_option('of_ln_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '60', 
										'media_height' => '50', 
										'thumb_align' => 'alignright', 
										'enable_default' => get_option('of_ln_enfea9'),
										'default_name' => 'tab_small.jpg'	
									)); 
								?>
								<?php if(get_option('of_ln_post_author') == 'true') { ?>
									<span class="author"><?php the_author_posts_link(); ?> | </span> 
								<?php } ?>								
								<?php echo string_limit_words(get_the_excerpt(), 15); ?>&hellip;
							</p>
							
							<div class="clear"></div>

							<span class="postmeta">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
								<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
								<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
							</span>			
							
						<?php } else { ?>
							<a class="list" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						<?php } ?>
						
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tabright -->
			<div class="clear"></div>		
		
		<?php endif; if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Tab3</span>'; } ?>
	</div><!-- /priBotTab3 -->			
		
	<!-- Tab 4 -->
	<div id="priBotTab4" class="tabcontent_body">
	
		<?php if ( ! dynamic_sidebar( 'Tab4' ) ) :  ?>
		
			<div class="tableft border_right_20">
				<?php 
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count_tab4a'),
				  'cat' => get_option('of_ln_cat_tab4')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == get_option('of_ln_post_count_tab4a')) { echo " lastPost"; } ?>">
						<?php 
							gab_media(array(
								'name' => 'line-tabs_big',
								'enable_video' => 'true',
								'video_id' => 'tab4', 
								'catch_image' => get_option('of_ln_catch_img'),
								'enable_thumb' => 'true',
								'resize_type' => 'c', 
								'media_width' => '300', 
								'media_height' => '225', 
								'thumb_align' => 'aligncenter', 
								'enable_default' => get_option('of_ln_enfea8'),
								'default_name' => 'tab_big.jpg'	
							)); 
						?>

						<h2 class="posttitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						</h2>

						<p>
							<?php if(get_option('of_ln_post_author') == 'true') { ?>
								<span class="author"><?php the_author_posts_link(); ?> | </span> 
							<?php } ?>						
							<?php echo string_limit_words(get_the_excerpt(), 45); ?>&hellip;
						</p>

						<span class="postmeta">
							<?php echo get_the_date(''); ?> / 
							<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
							<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
							<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tableft -->
			
			<div class="tabright">
				<?php 
				$numberofposts = get_option('of_ln_post_count_tab4b') + get_option('of_ln_post_count_tab4c');
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' =>  $numberofposts,
				  'offset' => get_option('of_ln_post_count_tab4a'),
				  'cat' => get_option('of_ln_cat_tab4')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == $numberofposts) { echo " lastPost"; } ?>">
							<?php if ($count <= get_option('of_ln_post_count_tab4b')) { ?>
							
							<h2 class="posttitle">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
							</h2>
							
							<p>	
								<?php 
									gab_media(array(
										'name' => 'line-tabs_small',
										'enable_video' => 'false',
										'catch_image' => get_option('of_ln_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '60', 
										'media_height' => '50', 
										'thumb_align' => 'alignright', 
										'enable_default' => get_option('of_ln_enfea9'),
										'default_name' => 'tab_small.jpg'	
									)); 
								?>
								<?php if(get_option('of_ln_post_author') == 'true') { ?>
									<span class="author"><?php the_author_posts_link(); ?> | </span> 
								<?php } ?>
								<?php echo string_limit_words(get_the_excerpt(), 15); ?>&hellip;
							</p>
							
							<div class="clear"></div>

							<span class="postmeta">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
								<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
								<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
							</span>			
							
						<?php } else { ?>
							<a class="list" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						<?php } ?>
						
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tabright -->
			<div class="clear"></div>		
		
		<?php endif; if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Tab4</span>'; } ?>
		
	</div><!-- /priBotTab4 -->
		
	<!-- Tab 5 -->
	<div id="priBotTab5" class="tabcontent_body">
		
		<?php if ( ! dynamic_sidebar( 'Tab5' ) ) : ?>
		
			<div class="tableft border_right_20">
				<?php 
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' => get_option('of_ln_post_count_tab5a'),
				  'cat' => get_option('of_ln_cat_tab5')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == get_option('of_ln_post_count_tab5a')) { echo " lastPost"; } ?>">
						<?php 
							gab_media(array(
								'name' => 'line-tabs_big',
								'enable_video' => 'true',
								'video_id' => 'tab5', 
								'catch_image' => get_option('of_ln_catch_img'),
								'enable_thumb' => 'true',
								'resize_type' => 'c', 
								'media_width' => '300', 
								'media_height' => '225', 
								'thumb_align' => 'aligncenter', 
								'enable_default' => get_option('of_ln_enfea8'),
								'default_name' => 'tab_big.jpg'	
							)); 
						?>

						<h2 class="posttitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						</h2>

						<p>
							<?php if(get_option('of_ln_post_author') == 'true') { ?>
								<span class="author"><?php the_author_posts_link(); ?> | </span> 
							<?php } ?>
							<?php echo string_limit_words(get_the_excerpt(), 45); ?>&hellip;
						</p>

						<span class="postmeta">
							<?php echo get_the_date(''); ?> / 
							<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
							<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
							<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
						</span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tableft -->
			
			<div class="tabright">
				<?php 
				$numberofposts = get_option('of_ln_post_count_tab5b') + get_option('of_ln_post_count_tab5c');
				$args = array(
				  'post__not_in'=>$do_not_duplicate,
				  'posts_per_page' =>  $numberofposts,
				  'offset' => get_option('of_ln_post_count_tab5a'),
				  'cat' => get_option('of_ln_cat_tab5')
				);
				$count = 1;
				$gab_query = new WP_Query();$gab_query->query($args); 
				while ($gab_query->have_posts()) : $gab_query->the_post();
				?>
					<div class="featuredPost<?php if ($count == $numberofposts) { echo " lastPost"; } ?>">
							<?php if ($count <= get_option('of_ln_post_count_tab5b')) { ?>
							
							<h2 class="posttitle">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
							</h2>
							
							<p>	
								<?php 
									gab_media(array(
										'name' => 'line-tabs_small',
										'enable_video' => 'false',
										'catch_image' => get_option('of_ln_catch_img'),
										'enable_thumb' => 'true',
										'resize_type' => 'c', 
										'media_width' => '60', 
										'media_height' => '50', 
										'thumb_align' => 'alignright', 
										'enable_default' => get_option('of_ln_enfea9'),
										'default_name' => 'tab_small.jpg'	
									)); 
								?>
								<?php if(get_option('of_ln_post_author') == 'true') { ?>
									<span class="author"><?php the_author_posts_link(); ?> | </span> 
								<?php } ?>
								<?php echo string_limit_words(get_the_excerpt(), 15); ?>&hellip;
							</p>
							
							<div class="clear"></div>

							<span class="postmeta">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','linepress'), __('1 Comment','linepress'), __('% Comments','linepress'));?> / 
								<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','linepress'); ?></a>
								<?php edit_post_link(__('Edit','linepress'),' / ',''); ?>
							</span>			
							
						<?php } else { ?>
							<a class="list" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
						<?php } ?>
						
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			</div><!-- /tabright -->
			<div class="clear"></div>		
		
		<?php endif; if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Tab5</span>'; } ?>
		
	</div><!-- /priBotTab5 -->
</div>

<?php dynamic_sidebar('TabbedSection2'); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">TabbedSection2</span>'; } ?>