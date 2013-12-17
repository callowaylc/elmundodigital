<?php get_header(); ?> 

	<?php /* Call top boxes boxes below navigation */ include( TEMPLATEPATH . '/home-teaser-boxes.php' ); ?>

	<div id="container" class="border_right_15">
		<?php /* Call featured content */ include( TEMPLATEPATH . '/home-featured.php' ); ?>
		<?php /* Call photo gallery slider */ include( TEMPLATEPATH . '/home-slider.php' ); ?>
		<?php /* Call primary content */ include( TEMPLATEPATH . '/home-primary-bottom.php' ); ?>
		<?php /* Call tabbed ajax content */  include( TEMPLATEPATH . '/home-tabbed-content.php' ); ?>
	</div> <!-- /#container -->
	
	<div id="sidebar">
		<?php get_sidebar(); ?> 
	</div><!-- End of sidebar -->

<div class="clear"></div>

<?php get_footer(); ?>
