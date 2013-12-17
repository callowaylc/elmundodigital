<meta name="google-site-verification" content="7z_UjBGtY1SS2TRGHBuDMYOKwI7GaU8D7DT_F2uMR0s" />

<?php get_header(); ?> 
	<div id="primaryTopWrapper">
		<div id="container">
		
			<?php dynamic_sidebar('Featured1');  
			
			if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Featured1</span>'; } ?>
		
			<?php if (intval(get_option('of_nw_fea_nr')) > 0 ) { ?>

				<script type="text/javascript">
					featuredcontentslider.init({
						id: "featured-slider", //id of main slider DIV
						contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
						toc: "markup", //Valid values: "#increment", "markup", ["label1", "label2", etc]
						nextprev: ["", ""], //labels for "prev" and "next" links. Set to "" to hide.
						revealtype: "<?php if(get_option('of_nw_fea_reveal') == 'OnClick') { echo 'click'; } else { echo 'mouseover'; } ?>", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
						enablefade: [true, 0.4], //[true/false, fadedegree]
						autorotate: [<?php if(get_option('of_nw_fea_rotate') == 'true') { echo 'true'; } else { echo 'false'; } ?>, <?php if ( get_option('of_nw_fea_pause') <> "" ) { echo get_option('of_nw_fea_pause').'000'; } else { echo '5000'; } ?>], //[true/false, pausetime]
						onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
							//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
							//curindex holds index of currently nwspn slide (1=1st slide, 2nd=2nd etc)
						}
					})
				</script>
				<!-- End of featured slider -->
			<?php } ?>
			
			<?php dynamic_sidebar('Featured2');  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Featured2</span>'; } ?>
		
			<div id="PrimaryLeft">

				<?php dynamic_sidebar('PrimaryLeft1');  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryLeft1</span>'; } ?>

				<?php if (intval(get_option('of_nw_post_count1')) > 0 ) { ?>
					<!-- Entries on middle column on the right side of Featured section -->
					<?php 
					$count = 1; 
					$args = array(
					  'post__not_in'=>$do_not_duplicate,
					  'posts_per_page' => get_option('of_nw_post_count1'),
					  'cat' => get_option('of_nw_cat_name1')
					);						
					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();
					?>
						<div class="featuredPost<?php if ($count == get_option('of_nw_post_count1')) { echo " lastPost"; } ?>">
						
							<?php if (($count == 1) and (get_option('of_nw_cat_name1')  <> "")) { ?>
								<span class="titleCatName">
									<a href="<?php echo get_category_link(get_option('of_nw_cat_name1'));?>"><?php echo get_cat_name(get_option('of_nw_cat_name1')); ?></a>
								</span>
							<?php } ?>
							
							<h2 class="sidebarPostTitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
							<p><?php echo string_limit_words(get_the_excerpt(), 16); ?>&hellip;</p>
							
							<span class="postmeta">
								<?php echo get_the_date(''); ?> / 
								<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> 
								<?php // edit_post_link(__('Edit','newspro'),' / ',''); ?>
							</span>
						</div>
					<?php $count++; endwhile; wp_reset_query(); ?>
					<!-- End of entries on middle column on the right side of Featured section -->
				<?php } ?>

				<?php dynamic_sidebar('PrimaryLeft2');  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryLeft2</span>'; } ?>

			</div><!-- End of PrimaryLeft -->
		
			<div id="PrimaryMid">
				
				<?php dynamic_sidebar('PrimaryMid1'); if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryMid1</span>'; } ?>
				
				 <script type="text/javascript">
					(function($) { $(document).ready(function(){
						var tabContainers = $('div.primaryBottomTabs > div');
							tabContainers.hide().filter(':first').show();

							$('div.primaryBottomTabs ul.primaryBottomTabs_title a').click(function () {
								tabContainers.hide();
								tabContainers.filter(this.hash).show();
								$('div.primaryBottomTabs ul.primaryBottomTabs_title a').removeClass('selected');
								$(this).addClass('selected');
							return false;
						}).filter(':first').click();
					})})(jQuery)
				</script>				

				<div class="primaryBottomTabs" id="primaryBottomTabs">	
					<ul class="primaryBottomTabs_title" id="primaryBottomTabs_title">
						<li><a href="#priBotTab1" rel="nofollow"><?php if ( get_option('of_nw_tabname2') <> "" ) { echo get_option('of_nw_tabname2'); } else { echo get_cat_name(get_option('of_nw_cat_name2')); } ?></a></li>
					<li><a href="#priBotTab2" rel="nofollow"><?php if ( get_option('of_nw_tabname3') <> "" ) { echo get_option('of_nw_tabname3'); } else { echo get_cat_name(get_option('of_nw_cat_name3')); } ?></a></li>
						<li><a href="#priBotTab3" rel="nofollow"><?php if ( get_option('of_nw_tabname4') <> "" ) { echo get_option('of_nw_tabname4'); } else { echo get_cat_name(get_option('of_nw_cat_name4')); } ?></a></li>


						<li><a href="#priBotTab4" rel="nofollow"><?php if ( get_option('of_nw_tabname5') <> "" ) { echo get_option('of_nw_tabname5'); } else { echo get_cat_name(get_option('of_nw_cat_name5')); } ?></a></li>
						<li><a href="#priBotTab5" rel="nofollow"><?php if ( get_option('of_nw_tabname6') <> "" ) { echo get_option('of_nw_tabname6'); } else { echo get_cat_name(get_option('of_nw_cat_name6')); } ?></a></li>
					</ul>
	
					<!-- Tab 1 -->
					<div id="priBotTab1" class="primaryBottomTabs_body">
						
						<?php if ( ! dynamic_sidebar( 'PrimaryBottomTab1' ) ) :  ?>
							<?php 
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'posts_per_page' => '1',
							  'cat' => get_option('of_nw_cat_name2')
							);						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<div class="text">
									<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
										
									<p>			
										<?php 
											gab_media(array(
												'name' => 'gab_featured',
												'enable_video' => 'true',
												'video_id' => 'tab1', 
												'catch_image' => get_option('of_nw_catch_img'),
												'enable_thumb' => 'true',
												'resize_type' => 'c', 
												'media_width' => '200', 
												'media_height' => '112', 
												'thumb_align' => 'alignleft', 
												'enable_default' => get_option('of_nw_enfea3'),
												'default_name' => 'primary_bottomtabs1.jpg'									
											)); 
										?>

										<?php if(get_option('of_nw_post_author') == 'true') { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
												
										<?php if(get_option('of_nw_post_date') == 'true') { ?>
											<span class="date"><?php echo get_the_time(''); ?> | </span>
										<?php } ?>
												
										<?php print string_limit_words(get_the_excerpt(), 36); ?>&hellip;
									</p>
											
									<div class="clear"></div>

								</div><!-- /text -->
										
								<span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
									<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
									<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
								</span>
										
							<?php endwhile; wp_reset_query(); ?>
						<?php endif;  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomTab1</span>'; } ?>
					</div><!-- /priBotTab1 -->
						
					<!-- Tab 2 -->
					<div id="priBotTab2" class="primaryBottomTabs_body">
						
						<?php if ( ! dynamic_sidebar( 'PrimaryBottomTab2' ) ) : ?>
							
							<?php 
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'posts_per_page' => '1',
							  'cat' => get_option('of_nw_cat_name3')
							);						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<div class="text">
									<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
									
									<p>			
										<?php 
											gab_media(array(
												'name' => 'gab_featured',
												'enable_video' => 'true',
												'video_id' => 'tab1', 
												'catch_image' => get_option('of_nw_catch_img'),
												'enable_thumb' => 'true',
												'resize_type' => 'c', 
												'media_width' => '200', 
												'media_height' => '112', 
												'thumb_align' => 'alignleft', 
												'enable_default' => get_option('of_nw_enfea3'),
												'default_name' => 'primary_bottomtabs1.jpg'									
											)); 
										?>

										<?php if(get_option('of_nw_post_author') == 'true') { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
												
										<?php if(get_option('of_nw_post_date') == 'true') { ?>
											<span class="date"><?php echo get_the_time(''); ?> | </span>
										<?php } ?>
												
										<?php print string_limit_words(get_the_excerpt(), 36); ?>&hellip;
									</p>
											
									<div class="clear"></div>

								</div><!-- /text -->
										
								<span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
									<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
									<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
								</span>
										
							<?php endwhile; wp_reset_query(); ?>
						<?php endif;  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomTab1</span>'; } ?>
					</div><!-- /priBotTab2 -->
						
					<!-- Tab 3 -->
					<div id="priBotTab3" class="primaryBottomTabs_body">
						
						<?php if ( ! dynamic_sidebar( 'PrimaryBottomTab3' ) ) :  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomTab3</span>'; } ?>
						
							<?php 
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'posts_per_page' => '1',
							  'cat' => get_option('of_nw_cat_name4')
							);						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<div class="text">
									<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
											
									<p>
										<?php 
											gab_media(array(
												'name' => 'gab_featured',
												'enable_video' => 'true',
												'video_id' => 'tab3', 
												'catch_image' => get_option('of_nw_catch_img'),
												'enable_thumb' => 'true',
												'resize_type' => 'c', 
												'media_width' => '200', 
												'media_height' => '112', 
												'thumb_align' => 'alignleft', 
												'enable_default' => get_option('of_nw_enfea5'),
												'default_name' => 'primary_bottomtabs3.jpg'									
											)); 
										?>

										<?php if(get_option('of_nw_post_author') == 'true') { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
												
										<?php if(get_option('of_nw_post_date') == 'true') { ?>
											<span class="date"><?php echo get_the_time(''); ?> | </span>
										<?php } ?>
												
										<?php print string_limit_words(get_the_excerpt(), 36); ?>&hellip;
									</p>
											
									<div class="clear"></div>

								</div><!-- /text -->
										
								<span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
									<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
									<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
								</span>
										
							<?php endwhile; wp_reset_query(); ?>
						<?php endif; ?>
					</div><!-- /priBotTab3 -->			
						
					<!-- Tab 4 -->
					<div id="priBotTab4" class="primaryBottomTabs_body">
						
						<?php if ( ! dynamic_sidebar( 'PrimaryBottomTab4' ) ) :  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomTab4</span>'; } ?>
						
							<?php 
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'posts_per_page' => '1',
							  'cat' => get_option('of_nw_cat_name5')
							);						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<div class="text">
									<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
									
									<p>
										<?php 
											gab_media(array(
												'name' => 'gab_featured',
												'enable_video' => 'true',
												'video_id' => 'tab4', 
												'catch_image' => get_option('of_nw_catch_img'),
												'enable_thumb' => 'true',
												'resize_type' => 'c', 
												'media_width' => '200', 
												'media_height' => '112', 
												'thumb_align' => 'alignleft', 
												'enable_default' => get_option('of_nw_enfea6'),
												'default_name' => 'primary_bottomtabs4.jpg'									
											)); 
										?>

										<?php if(get_option('of_nw_post_author') == 'true') { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
												
										<?php if(get_option('of_nw_post_date') == 'true') { ?>
											<span class="date"><?php echo get_the_time(''); ?> | </span>
										<?php } ?>
												
										<?php print string_limit_words(get_the_excerpt(), 36); ?>&hellip;
									</p>
											
									<div class="clear"></div>

								</div><!-- /text -->
										
								<span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
									<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
									<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
								</span>
										
							<?php endwhile; wp_reset_query(); ?>
						<?php endif; ?>
					</div><!-- /priBotTab4 -->
						
					<!-- Tab 5 -->
					<div id="priBotTab5" class="primaryBottomTabs_body">
						
						<?php if ( ! dynamic_sidebar( 'PrimaryBottomTab5' ) ) :  if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryBottomTab5</span>'; } ?>
						
							<?php 
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'posts_per_page' => '1',
							  'cat' => get_option('of_nw_cat_name6')
							);						
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();
							?>
								<div class="text">
									<h2 class="postTitle"><a href="<?php /* Do not use rel=bookmark for titles of tab content, that will break tabbing */ the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
											
									<p>
										<?php 
											gab_media(array(
												'name' => 'gab_featured',
												'enable_video' => 'true',
												'video_id' => 'tab5', 
												'catch_image' => get_option('of_nw_catch_img'),
												'enable_thumb' => 'true',
												'resize_type' => 'c', 
												'media_width' => '200', 
												'media_height' => '112', 
												'thumb_align' => 'alignleft', 
												'enable_default' => get_option('of_nw_enfea7'),
												'default_name' => 'primary_bottomtabs5.jpg'									
											)); 
										?>

										<?php if(get_option('of_nw_post_author') == 'true') { ?>
											<span class="author"><?php the_author_posts_link(); ?></span> 
										<?php } ?>
												
										<?php if(get_option('of_nw_post_date') == 'true') { ?>
											<span class="date"><?php echo get_the_time(''); ?> | </span>
										<?php } ?>
												
										<?php print string_limit_words(get_the_excerpt(), 36); ?>&hellip;
									</p>
											
									<div class="clear"></div>

								</div><!-- /text -->
										
								<span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
									<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
									<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
								</span>
										
							<?php endwhile; wp_reset_query(); ?>
						<?php endif; ?>
					</div><!-- /priBotTab5 -->
				</div>

				<div class="clear"></div>
									
				<div id="belowtabs">
					
        <ul>
    <?php query_posts('showposts=7'); ?>

    <?php while (have_posts()) : the_post(); ?>
    <li><h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4></li>
    <li class="img"><?php if ( function_exists( 'get_the_image' ) ) get_the_image(); ?></li>
    <li><?php the_excerpt(__('(more…)')); ?></li>
    <span class="postmeta">
									<?php echo get_the_date(''); ?> / 
									<?php comments_popup_link(__('No Comment','newspro'), __('1 Comment','newspro'), __('% Comments','newspro'));?> / 
									<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e('Read More','newspro'); ?></a>
									<?php edit_post_link(__('Edit','newspro'),' / ',''); ?>
								</span>
    <?php endwhile;?>
    </ul>
		

								
				</div> <!-- /belowtabs -->
				<div class="clear"></div>
				
				<?php dynamic_sidebar('PrimaryMid2'); if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">PrimaryMid2</span>'; } ?>

				<!-- End of entries below the primary bottom tabs -->
			</div> <!-- /#PrimaryMid -->
		</div> <!-- /#container -->

		<div id="sidebar">
			<?php get_sidebar(); ?> 
		</div><!-- End of sidebar -->
		
		<div class="clear"></div>
	</div><!-- End of PrimaryWrapper -->

	<!-- Media Gallery -->
	<?php if (intval(get_option('of_nw_postmedia_nr')) > 0 ) { ?>
		<div id="mediabar">
		
			<?php 
			if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Media_Bar</span>'; } 
			if ( ! dynamic_sidebar( 'Media_Bar' ) ) : 
			?>
			
				<?php if(get_option('of_nw_cat_media')  <> "") { ?>
					<span class="titleCatNameBig">
						<a href="<?php echo get_category_link(get_option('of_nw_cat_media'));?>"><?php echo get_cat_name(get_option('of_nw_cat_media')); ?></a>
					</span>
				<?php } ?>				
				
				<div id="previous_button"></div>
				<div id="next_button"></div>

				<div class="container">
					<ul>
						<?php 
						$count=1;
						$args = array(
						  'post__not_in'=>$do_not_duplicate,
						  'posts_per_page' => get_option('of_nw_postmedia_nr'),
						  'cat' => get_option('of_nw_cat_media')
						);						
						$gab_query = new WP_Query();$gab_query->query($args); 
						while ($gab_query->have_posts()) : $gab_query->the_post();
						?>	
						<li class="car">
							<div class="thumb">		
								<?php 
								gab_media(array(
									'name' => 'gab_featured', 
									'enable_video' => 'true', 
									'video_id' => 'mediabar', 
									'enable_thumb' => 'true', 
									'catch_image' => 'true',
									'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
									'media_width' => '230', 
									'media_height' => '129', 
									'thumb_align' => 'alignnone', 
										'enable_default' => get_option('of_nw_enfea10'),
									'default_name' => 'mainpage_photogal.jpg'
									)); 
								?>
							</div>
					
							<div class="thumbinfo">
								<p><?php the_title(); ?></p>
								<?php if (($gab_flv == '') and ($gab_video == '') and ($gab_vimeo == '') and ($gab_youtube == '') )  { ?>
									<p class="morePhoto"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Read More','newspro'); ?></a></p>
								<?php } else { ?>
									<p class="moreVideo"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'newspro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e('Play Video','newspro'); ?></a></p>
								<?php } ?>
							</div>
						</li>
						<?php $count++; endwhile; wp_reset_query(); ?>
					</ul>
				</div>
			<?php endif; ?>
		</div><!-- end of Mediabar -->
		<script type="text/javascript">
			(function($) { $(document).ready(function(){
				$("#mediabar .container").jCarouselLite({
					<?php if(get_option('of_nw_media_rotate') == 'true'){ ?>
						auto:<?php if ( get_option('of_nw_media_pause') <> "" ) { echo get_option('of_nw_media_pause').'000'; } else { echo '5000'; } ?>,
					<?php } ?>
					scroll: <?php if ( get_option('of_nw_media_scroll') <> "" ) { echo get_option('of_nw_media_scroll'); } else { echo '2'; } ?>,
					speed: <?php if ( get_option('of_nw_media_speed') <> "" ) { echo get_option('of_nw_media_speed').'000'; } else { echo '2000'; } ?>,	
					visible: 4,
					start: 0,
					circular: false,
					btnPrev: "#previous_button",
					btnNext: "#next_button"
				});
			})})(jQuery)	
		</script>
	<?php } ?>
	<script>
var options={ "publisher": "9e351c6a-1320-4851-8004-84fcaa51289f", "position": "right", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "googleplus", "reddit", "stumbleupon", "messenger", "myspace", "meneame", "digg", "pinterest", "delicious", "linkedin", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
<?php get_footer(); ?>