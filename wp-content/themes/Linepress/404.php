<?php get_header(); ?>
	<div id="container">	
	
		<div id="bcrum">
			<?php gab_breadcrumb(); ?>
		</div>
	
		<div class="post">
			<h2 class="archiveTitle"><?php _e('404 Error! Page Not Found','linepress'); ?></h2>
		</div>
		
	</div><!-- /container -->
	
	<div id="sidebar">
		<?php get_sidebar(); ?> 
	</div><!-- End of sidebar -->

	<div class="clear"></div>

<?php get_footer(); ?>