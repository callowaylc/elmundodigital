<?php 
	dynamic_sidebar( 'Sidebar1' ); if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Sidebar1</span>'; } 

	if(file_exists(TEMPLATEPATH . '/ads/sidebar_top_300x250/'. current_catID() .'.php') && (is_single() || is_category())) {
		include_once(TEMPLATEPATH . '/ads/sidebar_top_300x250/'. current_catID() .'.php');
	}
	else {
		include_once(TEMPLATEPATH . '/ads/sidebar_top_300x250.php');
	}

	dynamic_sidebar( 'Sidebar2' ); if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Sidebar2</span>'; } 

	if(file_exists(TEMPLATEPATH . '/ads/sidebar_bottom_300x250/'. current_catID() .'.php') && (is_single() || is_category())) {
		include_once(TEMPLATEPATH . '/ads/sidebar_bottom_300x250/'. current_catID() .'.php');
	}
	else {
		include_once(TEMPLATEPATH . '/ads/sidebar_bottom_300x250.php');
	}
		
	dynamic_sidebar( 'Sidebar3' ); if(get_option('of_nw_widget') == 'true') { echo '<span class="widgetname">Sidebar3</span>'; } 
?>

