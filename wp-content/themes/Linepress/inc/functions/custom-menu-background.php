<?php
add_theme_support( 'menus' );
	
register_nav_menus( array(
	'primary-navigation' => 'Primary Nav',
	'secondary-navigation' => '(If available) Secondary Nav',
	'masthead' => '(if available) Masthead',
) );

add_custom_background();