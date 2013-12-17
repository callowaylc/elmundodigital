<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'gabfire_js_init' );
if (!function_exists('gabfire_js_init')) {
	function gabfire_js_init() {	
	wp_enqueue_script('jquery');
	wp_enqueue_script('flowplayer', GABFIRE_JS_DIR .'/flowplayer/flowplayer-3.2.6.min.js');
	wp_enqueue_script('contentslider', GABFIRE_JS_DIR .'/contentslider.js');
	wp_enqueue_script('slidesjs', GABFIRE_JS_DIR .'/slides.min.jquery.js',array( 'jquery' ));
	wp_enqueue_script('superfish', GABFIRE_JS_DIR .'/superfish-1.4.8.js');
	wp_enqueue_script('jCarouselLite', GABFIRE_JS_DIR .'/jCarouselLite.js',array( 'jquery' ));		
	}
}