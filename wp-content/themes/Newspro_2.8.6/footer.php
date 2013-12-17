</div><!-- end of wrapper -->

<div id="footer">

	<div id="foo_widget1">
		<?php if ( ! dynamic_sidebar( 'Footer1' ) ) : ?>
		
			<h3 class="widgettitle">Widgetized Section</h3>
			<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer1 Widget Zone</p>
			
		<?php endif; if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Footer1</span>'; } ?>
	</div>

	<div id="foo_widget2">
		<?php if ( ! dynamic_sidebar( 'Footer2' ) ) : ?>
		
			<h3 class="widgettitle">Widgetized Section</h3>
			<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer2 Widget Zone</p>
			
		<?php endif; if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Footer2</span>'; } ?>
		<div class="clear"></div>
	</div>
	
	<div id="foo_widget3">	
		<?php if ( ! dynamic_sidebar( 'Footer3' ) ) : ?>
		
			<h3 class="widgettitle">Widgetized Section</h3>
			<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer1 Widget Zone</p>
			
		<?php endif; 	if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Footer3</span>'; } ?>
	</div>

	<div class="clear"></div>
	
	<div id="foo_widget4">
		<?php if ( ! dynamic_sidebar( 'Footer4' ) ) : ?>
		
			<h3 class="widgettitle">Widgetized Section</h3>
			<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer4 Widget Zone</p>
			
		<?php endif; 	if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Footer4</span>'; } 	?>
	</div>
	
	<div id="foo_widget5">
		<?php if ( ! dynamic_sidebar( 'Footer5' ) ) : ?>
		
			<h3 class="widgettitle">Widgetized Section</h3>
			<p>Go to Admin &raquo; appearance &raquo; Widgets &raquo;  and move a widget into Footer5 Widget Zone</p>

		<?php endif; if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Footer5</span>'; }  ?>
	</div>

	<div class="clear"></div>
</div><!-- /footer -->

<div id="footer_data">
	<div id="footer-left-side">
		<?php /* Replace default text if option is set */
		if( get_option('of_nw_footer_left') == 'true'){
			echo get_option('of_nw_footer_left_text');
		} else { 
		?>
			<a href="<?php echo home_url( '/' ) ?>" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a>&nbsp;Todo bajo licencia Creative Commons, previa consulta con webmaster <br>
		<?php } ?>
	</div><!-- #site-info -->
			
	<div id="footer-right-side">
		<?php /* Replace default text if option is set */
		if( get_option('of_nw_footer_right') == 'true'){ 
			echo get_option('of_nw_footer_right_text');
		} else {
			wp_loginout(); 
			if ( is_user_logged_in() ) { 
				echo '-'; ?>
				<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php">Posts</a> - 
				<a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php">Add New</a>
			<?php } ?> 
			<a href="http://antivirus-programs.net" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'newspro'); ?>" rel="generator"></a> - 
			Patrocinado por <a href="http://antivirus-programs.net" title="Antivirus Reviews">Antivirus Reviews</a> 
			<?php wp_footer(); ?>
		<?php } ?>
	</div> <!-- #footer-right-side -->
	<div class="clear"></div>
</div><!-- /footer_data -->
<script type="text/javascript" src="http://www.luminate.com/widget/11c0daacda9/"></script>

</body>
</html>