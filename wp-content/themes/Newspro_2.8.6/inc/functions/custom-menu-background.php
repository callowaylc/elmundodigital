<?php
add_theme_support( 'menus' );
	
register_nav_menus( array(
	'primary-navigation' => 'Primary Navigation',
	'secondary-navigation' => 'Primary Navigation',
	'masthead' => '(if available) Masthead',
) );

add_theme_support('post-thumbnails');

add_custom_background();