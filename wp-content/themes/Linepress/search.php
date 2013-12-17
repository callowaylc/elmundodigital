<?php get_header(); ?>
	<div id="container">	
		
	<div id="bcrum">
		<?php gab_breadcrumb(); ?>
	</div>

	<?php include (TEMPLATEPATH . '/archive-default.php'); ?>
			
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
