<?php
function gabfire_register_sidebar($args) {
	$common = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>'
	);

	$args = wp_parse_args($args, $common);

	return register_sidebar($args);
}

gabfire_register_sidebar(array( 
	'name' => 'Sidebar1-Home',
	'description' => 'Sidebar above 300x250 ad spot [only for homepage]',
	'id' => 'Sidebar1-Home'
));
gabfire_register_sidebar(array( 
	'name' => 'Sidebar2-Home',
	'description' => 'Sidebar above ajax tabs [only for homepage]',
	'id' => 'Sidebar2-Home'
));
gabfire_register_sidebar(array( 
	'name' => 'Sidebar3-Home',
	'description' => 'Sidebar below ajax tabs [only for homepage]',
	'id' => 'Sidebar3-Home'
));
gabfire_register_sidebar(array( 
	'name' => 'Sidebar1-Innerpage',
	'description' => 'Sidebar above 300x250 ad spot [only for innerpages]',
	'id' => 'Sidebar1-Innerpage'
));
gabfire_register_sidebar(array( 
	'name' => 'Sidebar2-Innerpage',
	'description' => 'Sidebar above ajax tabs [only for innerpages]',
	'id' => 'Sidebar2-Innerpage'
));
gabfire_register_sidebar(array( 
	'name' => 'Sidebar3-Innerpage',
	'description' => 'Sidebar below ajax tabs [only for innerpages]',
	'id' => 'Sidebar3-Innerpage'
));
gabfire_register_sidebar(array( 
	'name' => 'Featured1',
	'description' => 'Above featured block',
	'id' => 'Featured1'
));
gabfire_register_sidebar(array( 
	'name' => 'Featured2',
	'description' => 'Below featured block',
	'id' => 'Featured2'
));
gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottom1',
	'description' => 'Above primary bottom content',
	'id' => 'PrimaryBottom1'
));
gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomLeft1',
	'description' => 'primary bottom left - above entries',
	'id' => 'PrimaryBottomLeft1'
));
gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomLeft2',
	'description' => 'Primary bottom left - below entries',
	'id' => 'PrimaryBottomLeft2'
));
gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomRight1',
	'description' => 'primary bottom right - above ad',
	'id' => 'PrimaryBottomRight1'
));
gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottomRight2',
	'description' => 'Primary bottom right - Below videos',
	'id' => 'PrimaryBottomRight2'
));
gabfire_register_sidebar(array( 
	'name' => 'PrimaryBottom2',
	'description' => 'Below primary bottom content',
	'id' => 'PrimaryBottom2'
));
gabfire_register_sidebar(array( 
	'name' => 'TabbedSection1',
	'description' => 'Above tabbed content',
	'id' => 'TabbedSection1'
));
gabfire_register_sidebar(array( 
	'name' => 'TabbedSection2',
	'description' => 'Below tabbed content',
	'id' => 'TabbedSection2'
));
gabfire_register_sidebar(array( 
	'name' => 'Tab1',
	'description' => 'First ajax tab',
	'id' => 'Tab1'
));
gabfire_register_sidebar(array( 
	'name' => 'Tab2',
	'description' => 'Second ajax tab',
	'id' => 'Tab2'
));
gabfire_register_sidebar(array( 
	'name' => 'Tab3',
	'description' => 'Third ajax tab',
	'id' => 'Tab3'
));
gabfire_register_sidebar(array( 
	'name' => 'Tab4',
	'description' => 'Fourth ajax tab',
	'id' => 'Tab4'
));
gabfire_register_sidebar(array( 
	'name' => 'Tab5',
	'description' => 'Fifth ajax tab',
	'id' => 'Tab5'
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
	'name' => 'PostWidget',
	'description' => 'Single post page, between entry and comments',
	'id' => 'PostWidget'
));
gabfire_register_sidebar(array( 
	'name' => 'PageWidget',
	'description' => 'Below entry for widgetized page template',
	'id' => 'PageWidget'
));