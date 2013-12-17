</div><!-- end of wrapper -->

<?php if (( get_option('of_ln_footerleft_ad') <> "" ) or ( get_option('of_ln_footerright_ad') <> "" )) { ?>
	<div id="bottom_banners">
		<div class="leftad">
			<?php
				if(file_exists(TEMPLATEPATH . '/ads/footer_left/'. current_catID() .'.php') && (is_single() || is_category())) {
					include_once(TEMPLATEPATH . '/ads/footer_left/'. current_catID() .'.php');
				}
				else {
					include_once(TEMPLATEPATH . '/ads/footer_left.php');
				}
			?>		
		</div>
		<div class="rightad">
			<?php
				if(file_exists(TEMPLATEPATH . '/ads/footer_right/'. current_catID() .'.php') && (is_single() || is_category())) {
					include_once(TEMPLATEPATH . '/ads/footer_right/'. current_catID() .'.php');
				}
				else {
					include_once(TEMPLATEPATH . '/ads/footer_right.php');
				}
			?>
			
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>

<div id="footer">
	<div id="footerinner">
	
		<div id="foo_widget1">
			<?php if ( ! dynamic_sidebar( 'Footer1' ) ) : ?>
			
				<h3 class="widgettitle">Widgetized Section</h3>
				<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer1 Widget Zone</p>
				
			<?php endif; if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Footer1</span>'; } ?>
		</div>

		<div id="foo_widget2">
			<?php if ( ! dynamic_sidebar( 'Footer2' ) ) : ?>
			
				<h3 class="widgettitle">Widgetized Section</h3>
				<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer2 Widget Zone</p>
				
			<?php endif; if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Footer2</span>'; } ?>
			<div class="clear"></div>
		</div>
		
		<div id="foo_widget3">	
			<?php if ( ! dynamic_sidebar( 'Footer3' ) ) : ?>
			
				<h3 class="widgettitle">Widgetized Section</h3>
				<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer1 Widget Zone</p>
				
			<?php endif; if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Footer3</span>'; } ?>
		</div>
		
		<div class="clear"></div>
		
	</div><!-- /footerinner -->
</div><!-- /footer -->

<div id="footer_data">
<?php /*
	<ul><?php wp_list_categories('orderby=ID&order=DESC&title_li=&depth=1'); ?>	</ul>
*/ ?>
	<div id="footer-left-side">
		<?php /* Replace default text if option is set */
		if( get_option('of_ln_footer_left') == 'true'){
			echo get_option('of_ln_footer_left_text');
		} else { 
		?>
			<a href="<?php echo home_url( '/' ) ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>
		<?php } ?>
	</div><!-- #site-info -->
			
	<div id="footer-right-side">
		<?php /* Replace default text if option is set */
		if( get_option('of_ln_footer_right') == 'true'){ 
			echo get_option('of_ln_footer_right_text');
		} else {
			wp_loginout(); 
			if ( is_user_logged_in() ) { 
				echo '-'; ?>
				<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php">Posts</a> - 
				<a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php">Add New</a>
			<?php } ?> - 
			<a href="http://www.racktheme.com/" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'linepress'); ?>" rel="generator"><?php _e('Powered by Rack Theme', 'linepress'); ?></a> - 
			Designed by <a href="http://www.gabfirethemes.com/" title="Premium WordPress Themes">Gabfire Themes</a> 
			<?php wp_footer(); ?>
		<?php } ?>
	</div> <!-- #footer-right-side -->
	<div class="clear"></div>
</div><!-- /footer_data -->

</body>
</html>