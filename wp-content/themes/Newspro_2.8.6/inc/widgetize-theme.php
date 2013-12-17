<?php
function gabfire_register_sidebar($args) {
	$common = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => "</h3>\n"
	);

	$args = wp_parse_args($args, $common);

	return register_sidebar($args);
}

gabfire_register_sidebar(array( 
	'name' => 'Featured1',
	'description' => 'Primary top left column above featured slider',
	'id' => 'Featured1'
));

gabfire_register_sidebar(array( 
	'name' => 'Featured2',
	'description' => 'Primary top left column below featured slider',
	'id' => 'Featured2'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryLeft1',
	'description' => 'Left column below featured slider - top',
	'id' => 'PrimaryLeft1'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryLeft2',
	'description' => 'Left column below featured slider - bottom',
	'id' => 'PrimaryLeft2'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryMid1',
	'description' => 'Mid column below featured slider - top',
	'id' => 'PrimaryMid1'
));
gabfire_register_sidebar(array( 
	'name' => 'Primary Mid 2',
	'description' => 'Mid column below featured slider - bottom',
	'id' => 'PrimaryMid2'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomTab1',
	'description' => 'First ajax tab on mid column below featured slider',
	'id' => 'PrimaryBottomTab1'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomTab2',
	'description' => 'Second ajax tab on mid column below featured slider',
	'id' => 'PrimaryBottomTab2'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomTab3',
	'description' => 'Third ajax tab on mid column below featured slider',
	'id' => 'PrimaryBottomTab3'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomTab4',
	'description' => 'Fourth ajax tab on mid column below featured slider',
	'id' => 'PrimaryBottomTab4'
));

gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomTab5',
	'description' => 'Fifth ajax tab on mid column below featured slider',
	'id' => 'PrimaryBottomTab5'
));

gabfire_register_sidebar(array( 
	'name' => 'BelowTabsLeft1',
	'description' => 'Left column below ajax tabs - top',
	'id' => 'BelowTabsLeft1'
));

gabfire_register_sidebar(array( 
	'name' => 'BelowTabsLeft2',
	'description' => 'Left column below ajax tabs - bottom',
	'id' => 'BelowTabsLeft2'
));

gabfire_register_sidebar(array( 
	'name' => 'BelowTabsRight1',
	'description' => 'Right column below ajax tabs - top',
	'id' => 'BelowTabsRight1'
));

gabfire_register_sidebar(array( 
	'name' => 'BelowTabsRight2',
	'description' => 'Right column below ajax tabs - bottom',
	'id' => 'BelowTabsRight2'
));

gabfire_register_sidebar(array( 
	'name' => 'Sidebar1',
	'description' => 'Sidebar above 300x250 ad spot',
	'id' => 'Sidebar1'
));

gabfire_register_sidebar(array( 
	'name' => 'Sidebar2',
	'description' => 'Sidebar above ajax tabs',
	'id' => 'Sidebar2'
));

gabfire_register_sidebar(array( 
	'name' => 'Sidebar3',
	'description' => 'Sidebar below ajax tabs',
	'id' => 'Sidebar3'
));

gabfire_register_sidebar(array( 
	'name' => 'Media_Bar',
	'description' => 'Replace media category with any custom widget',
	'id' => 'Media_Bar'
));

gabfire_register_sidebar(array( 
	'name' => 'Footer1',
	'description' => 'Footer #1 widgetized column',
	'id' => 'Footer1'
));

gabfire_register_sidebar(array( 
	'name' => 'Footer2',
	'description' => 'Footer #2 widgetized column',
	'id' => 'Footer2'
));

gabfire_register_sidebar(array( 
	'name' => 'Footer3',
	'description' => 'Footer #3 widgetized column',
	'id' => 'Footer3'
));

gabfire_register_sidebar(array( 
	'name' => 'Footer4',
	'description' => 'Footer #4 widgetized column',
	'id' => 'Footer4'
));

gabfire_register_sidebar(array( 
	'name' => 'Footer5',
	'description' => 'Footer #5 widgetized column',
	'id' => 'Footer5'
));

gabfire_register_sidebar(array( 
	'name' => 'PostWidget',
	'description' => 'Single post page, between entry and comments',
	'id' => 'PostWidget'
));

gabfire_register_sidebar(array( 
	'name' => 'PageWidget',
	'description' => 'Below entry for widgetized page template',
	'id' => 'PageWidget'
));