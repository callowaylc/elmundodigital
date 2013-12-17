<?php
/* Get current cat id for category and single post pages 
 * needed for category based advertisement
 */ 
function current_catID() {
	global $wp_query,  $cat_obj, $currentcat;

	if (is_category()) {	
		$cat_obj = $wp_query->get_queried_object();
		$$currentcat = $cat_obj->term_id;
	} 
	elseif (is_single()) {
		$category = get_the_category();
		$currentcat = $category[0]->cat_ID;
	}
	
	return $currentcat;
}