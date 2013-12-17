<?php
/* File: functions.php
 * Version: 0.3
 * /

/* Set the file path based on whether the Options Framework is in a parent theme or child theme */
if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}

define('GABFIRE_INC_PATH', OF_FILEPATH . '/inc');
define('GABFIRE_INC_DIR', OF_DIRECTORY . '/inc');
define('GABFIRE_FUNCTIONS_PATH', OF_FILEPATH . '/inc/functions');
define('GABFIRE_JS_DIR', OF_DIRECTORY . '/inc/js');

require_once (GABFIRE_INC_PATH . '/theme-init.php');		// Custom functions and plugins

// Paste your custom functions below this line