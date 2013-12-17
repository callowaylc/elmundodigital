<?php 
/* These files build out the options interface.  Likely won't need to edit these. */
require_once (GABFIRE_INC_PATH . '/admin/admin-functions.php');		// Custom functions and plugins
require_once (GABFIRE_INC_PATH . '/admin/admin-interface.php');		// Admin Interfaces (options,framework, seo)

/* These files build out the theme specific options and associated functions. */
require_once (GABFIRE_INC_PATH . '/admin/theme-options.php'); 		// Options panel settings and custom settings
require_once (GABFIRE_INC_PATH . '/admin/theme-functions.php'); 	// Theme actions based on options settings

require_once (GABFIRE_INC_PATH . '/theme-js.php'); // Load theme Javascripts
require_once (GABFIRE_INC_PATH . '/theme-comments.php');	// Load custom comments template
require_once (GABFIRE_INC_PATH . '/widgetize-theme.php'); // Register sidebars
require_once (GABFIRE_INC_PATH . '/I18n-functions.php'); // localization support
require_once (GABFIRE_INC_PATH . '/wpmu-thumbnails.php'); // Load theme thumbnails

// load framework functions
require_once (GABFIRE_FUNCTIONS_PATH . '/breadcrumb.php'); // Breadcrumb function
require_once (GABFIRE_FUNCTIONS_PATH . '/catch-image.php'); // Catch first image of posts
require_once (GABFIRE_FUNCTIONS_PATH . '/custom-menu-background.php'); // Add WordPress custom menu and background support
require_once (GABFIRE_FUNCTIONS_PATH . '/dashboard-widget.php'); // Gabfire Themes RSS widget for WP Dashboard
require_once (GABFIRE_FUNCTIONS_PATH . '/gabfire-media.php'); // Gabfire Media Module
require_once (GABFIRE_FUNCTIONS_PATH . '/get-current-id.php'); // Get Current ID for Post and Category pages - used for category based advertisement
require_once (GABFIRE_FUNCTIONS_PATH . '/limit-excerpt.php');  // Limit post excerpt on front page function 
require_once (GABFIRE_FUNCTIONS_PATH . '/gabfire-widgets.php'); // Custom gabfire widgets