<?php get_header(); ?>
	<div id="container">	
		
	<div id="bcrum">
		<?php gab_breadcrumb(); ?>
	</div>
			
	<?php if (is_author()) { ?>
		<div class="gab_authorInfo">
		<?php global $wp_query; $curauth = $wp_query->get_queried_object(); ?>
			<div class="gab_authorPic">
				<?php echo get_avatar( $curauth->user_email, '50' ); ?>
			</div>
			<strong><?php _e('Stories written by','linepress'); ?> <?php echo $curauth->nickname; ?></strong><br /><?php echo $curauth->description; ?>
			<div class="clear"></div>
		</div>			
	<?php } ?>
		
	<?php 
		if (get_option('of_ln_media_temp') <> "" && is_category(explode(',',get_option('of_ln_media_temp')))) {
			include (TEMPLATEPATH . '/archive-media.php'); 
		} else {
		include (TEMPLATEPATH . '/archive-default.php'); } 
	?>
			
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div id="nav-below" class="navigation">
			<div class="left"><?php next_posts_link( __( '&larr; Older posts', 'linepress' ) ); ?></div>
			<div class="right"><?php previous_posts_link( __( 'Newer posts &rarr;', 'linepress' ) ); ?></div>
			<div class="clear"></div>
		</div><!-- #nav-below -->
	<?php endif; ?>		
			
</div><!-- /container -->
		
<div id="sidebar">
	<?php get_sidebar(); ?> 
</div><!-- End of sidebar -->

<div class="clear"></div>

<?php get_footer(); ?>
