<?php
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 50, 50, true); // Normal Post Thumbnails

if(get_option('of_wpmumode') == 'false') {
	add_image_size( 'gab_featured', 700, 9999 ); /* Featured Big Image (this is the source image to be resized with timthumb */
} else {
	/* Theme thumbnail sizes for WordPress multi user
	 * network installations. The image sizes below will  
	 * be used only when WPMU mode is activated on 
	 * theme options -> under General settings tab
	 */
	add_image_size( 'line-fea', 405, 9999 ); // Featured Big Image
	add_image_size( 'line-teaser', 100, 90, true ); // Thumbnail for teaser boxes
	add_image_size( 'line-slider', 130, 120, true ); // Thumbnail slider
	add_image_size( 'line-b_slider', 120, 90, true ); // Thumbnail for left hand below slider
	add_image_size( 'line-mid', 280, 200, true ); // Medium size thumbnail (archive-last post)
	add_image_size( 'line-tabs_big', 300, 225, true ); // Ajax tabs, big thumbnail
	add_image_size( 'line-tabs_small', 60, 50, true ); // Ajax tabs, small thumbnail
	add_image_size( 'line-archive', 190, 110, true ); // Default archive style thumbnails
	add_image_size( 'line-arc_media', 294, 180, true ); // Media gallery category temaplate slider
}