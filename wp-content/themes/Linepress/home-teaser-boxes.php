<div id="teaser">
	<div class="col_teaser" onmouseover="this.className='col_teaser active'" onmouseout="this.className='col_teaser'">
		<?php 
		$count=1;
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'posts_per_page' => 1,
		  'cat' => get_option('of_ln_cat_teaser1')
		);						
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();
		$do_not_duplicate[] = $post->ID
		?>		
			<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php 
					gab_media(array(
						'name' => 'line-teaser',
						'enable_video' => 'false',
						'catch_image' => get_option('of_ln_catch_img'),
						'enable_thumb' => 'true',
						'resize_type' => 'c', 
						'media_width' => '100', 
						'media_height' => '90', 
						'thumb_align' => 'teaser_img', 
						'enable_default' => get_option('of_ln_enfea1'),
						'default_name' => 'teaser_1.jpg'									
					)); 
				?>
			</a>
						
			<?php if (get_option('of_ln_cat_teaser1')  <> "") { ?>
				<span class="titleCatName">
					<a href="<?php echo get_category_link(get_option('of_ln_cat_teaser1'));?>"><?php echo get_cat_name(get_option('of_ln_cat_teaser1')); ?></a>
				</span>
			<?php } ?>		
					
			<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="clear"></div>
		<?php $count++; endwhile; wp_reset_query(); ?>
	</div>
		<div class="col_teaser odd"  onmouseover="this.className='col_teaser active'" onmouseout="this.className='col_teaser odd'">
		<?php 
		$count=1;
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'posts_per_page' => 1,
		  'cat' => get_option('of_ln_cat_teaser2')
		);						
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();
		$do_not_duplicate[] = $post->ID
		?>
			<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php 
					gab_media(array(
						'name' => 'line-teaser',
						'enable_video' => 'false',
						'catch_image' => get_option('of_ln_catch_img'),
						'enable_thumb' => 'true',
						'resize_type' => 'c', 
						'media_width' => '100', 
						'media_height' => '90', 
						'thumb_align' => 'teaser_img', 
						'enable_default' => get_option('of_ln_enfea2'),
						'default_name' => 'teaser_2.jpg'									
					)); 
				?>
			</a>			
			<?php if (get_option('of_ln_cat_teaser2')  <> "") { ?>
				<span class="titleCatName">
					<a href="<?php echo get_category_link(get_option('of_ln_cat_teaser2'));?>"><?php echo get_cat_name(get_option('of_ln_cat_teaser2')); ?></a>
				</span>
			<?php } ?>		
						
			<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="clear"></div>
		<?php $count++; endwhile; wp_reset_query(); ?>
	</div>
			
	<div class="col_teaser" onmouseover="this.className='col_teaser active'" onmouseout="this.className='col_teaser'">
		<?php 
		$count=1;
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'posts_per_page' => 1,
		  'cat' => get_option('of_ln_cat_teaser3')
		);						
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();
		$do_not_duplicate[] = $post->ID
		?>	
			<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">			
				<?php 
					gab_media(array(
						'name' => 'line-teaser',
						'enable_video' => 'false',
						'catch_image' => get_option('of_ln_catch_img'),
						'enable_thumb' => 'true',
						'resize_type' => 'c', 
						'media_width' => '100', 
						'media_height' => '90', 
						'thumb_align' => 'teaser_img', 
						'enable_default' => get_option('of_ln_enfea3'),
						'default_name' => 'teaser_3.jpg'									
					)); 
				?>
			</a>				
			<?php if (get_option('of_ln_cat_teaser3')  <> "") { ?>
				<span class="titleCatName">
					<a href="<?php echo get_category_link(get_option('of_ln_cat_teaser3'));?>"><?php echo get_cat_name(get_option('of_ln_cat_teaser3')); ?></a>
				</span>
			<?php } ?>		
					
			<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="clear"></div>
		<?php $count++; endwhile; wp_reset_query(); ?>
	</div>
			
	<div class="col_teaser last odd" onmouseover="this.className='col_teaser last active'" onmouseout="this.className='col_teaser last odd'">
		<?php 
		$count=1;
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'posts_per_page' => 1,
		  'cat' => get_option('of_ln_cat_teaser4')
		);						
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();
		$do_not_duplicate[] = $post->ID
		?>	
			<a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<?php 
					gab_media(array(
						'name' => 'line-teaser',
						'enable_video' => 'false',
						'catch_image' => get_option('of_ln_catch_img'),
						'enable_thumb' => 'true',
						'resize_type' => 'c', 
						'media_width' => '100', 
						'media_height' => '90', 
						'thumb_align' => 'teaser_img', 
						'enable_default' => get_option('of_ln_enfea4'),
						'default_name' => 'teaser_4.jpg'									
					)); 
				?>
			</a>
						
			<?php if (get_option('of_ln_cat_teaser4')  <> "") { ?>
				<span class="titleCatName">
					<a href="<?php echo get_category_link(get_option('of_ln_cat_teaser4'));?>"><?php echo get_cat_name(get_option('of_ln_cat_teaser4')); ?></a>
				</span>
			<?php } ?>		
			
			<h2 class="posttitle"><a href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'linepress' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="clear"></div>
		<?php $count++; endwhile; wp_reset_query(); ?>
	</div>
	<div class="clear"></div>
</div><!-- /teaser -->