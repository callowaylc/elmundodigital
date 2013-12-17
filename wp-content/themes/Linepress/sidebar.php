<?php 
	if (is_home()) {
		dynamic_sidebar( 'Sidebar1-Home' ); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Sidebar1-Home</span>'; } 
	} else {
		dynamic_sidebar( 'Sidebar1-Innerpage' ); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Sidebar1-Innerpage</span>'; } 
	}
	
	echo '<div class="widget">';
		if(file_exists(TEMPLATEPATH . '/ads/sidebar_top_300x250/'. current_catID() .'.php') && (is_single() || is_category())) {
			include_once(TEMPLATEPATH . '/ads/sidebar_top_300x250/'. current_catID() .'.php');
		}
		else {
			include_once(TEMPLATEPATH . '/ads/sidebar_top_300x250.php');
		}
	echo '</div>';

	if (is_home()) {
		dynamic_sidebar( 'Sidebar2-Home' ); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Sidebar2-Home</span>'; } 
	} else {
		dynamic_sidebar( 'Sidebar2-Innerpage' ); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Sidebar2-Innerpage</span>'; } 
	}

	echo '<div class="widget">';
		if(file_exists(TEMPLATEPATH . '/ads/sidebar_bottom_300x250/'. current_catID() .'.php') && (is_single() || is_category())) {
			include(TEMPLATEPATH . '/ads/sidebar_bottom_300x250/'. current_catID() .'.php');
		}
		else {
			include_once(TEMPLATEPATH . '/ads/sidebar_bottom_300x250.php');
		}
	echo '</div>';
	
	if (is_home()) {
		dynamic_sidebar( 'Sidebar3-Home' ); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Sidebar3-Home</span>'; } 
	} else {
		dynamic_sidebar( 'Sidebar3-Innerpage' ); if(get_option('of_ln_widget') == 'true') { echo '<span class="widgetname">Sidebar3-Innerpage</span>'; } 
	}
?>