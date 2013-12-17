<?php
add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "of";
$themeid = "_nw";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$of_categories = array(0 =>"Select a category:") + $of_categories; 

//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_revealtype = array("OnMouseover","OnClick");
$options_feanr = array("0 (disable)","5");
$options_inslider = array("Site Wide","Tag-based","Disable");
$options_sort = array("ASC","DESC");
$options_order = array("ID","name","count");
$options_logo = array("Text Based Logo","Image Based Logo");
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Set the Options Array
$options = array();

$options[] = array( "name" => "General Settings",
                    "type" => "heading");
					
$url =  get_bloginfo('stylesheet_directory') . '/inc/admin/images/';
$options[] = array( "name" => "Select header style",
					"desc" => "Set your header either to display a single image or logo and 728px banner side by side.",
					"id" => $shortname.$themeid."_header_type",
					"std" => "",
					"type" => "images",
					"options" => array(
						'logobanner' => $url . 'logobanner.gif',
						'singleimage' => $url . 'single-image.gif'));

		$options[] = array( "name" => "Header image (if single image selected)",
							"desc" => "If single image option is selected as header type, upload a header banner that is set to 970px width.",
							"id" => $shortname.$themeid."_himageurl",
							"std" => "",
							"type" => "upload");				
					
		$options[] = array( "name" => "Logo Type",
							"desc" => "If text-based logo is selected, set sitename and tagline on WordPress settings page.",
							"id" => $shortname.$themeid."_logo_type",
							"std" => "Text Based Logo",
							"type" => "select",
							"options" => $options_logo); 

		$options[] = array( "name" => "Custom Logo",
							"desc" => "If image-based logo is selected, upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
							"id" => $shortname.$themeid."_logo",
							"std" => "",
							"type" => "upload");
							
		$options[] = array( "name" => "Logo Padding Top",
							"desc" => "Set a padding value between logo and top line.",
							"id" => $shortname.$themeid."_padding_top",
							"std" => "15",
							"class" => "mini",
							"type" => "text");	

		$options[] = array( "name" => "Logo Padding Bottom",
							"desc" => "Set a padding value between logo and bottom line.",
							"id" => $shortname.$themeid."_padding_bottom",
							"std" => "10",
							"class" => "mini",
							"type" => "text");
							
		$options[] = array( "name" => "Logo Padding Left",
							"desc" => "Set a padding value between logo and left line.",
							"id" => $shortname.$themeid."_padding_left",
							"std" => "0",
							"class" => "mini",
							"type" => "text");
							
		$options[] = array( "name" => "Custom Favicon",
							"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
							"id" => $shortname."_custom_favicon",
							"std" => "",
							"type" => "upload"); 
							
		$options[] = array( "name" => "RSS",
							"desc" => "Link to third party feed handler. <br/> [http://www.url.com]",
							"id" => $shortname.$themeid."_rssaddr",
							"std" => "",
							"type" => "text"); 							
													   
		$options[] = array( "name" => "Tracking Code",
							"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
							"id" => $shortname."_google_analytics",
							"std" => "",
							"type" => "textarea"); 

$options[] = array( "name" => "Styling Options",
					"type" => "heading");
					
		$options[] = array( "name" => "Theme Stylesheet",
							"desc" => "Select your themes alternative color scheme (i.e., active style).",
							"id" => $shortname."_alt_stylesheet",
							"std" => "default.css",
							"type" => "select",
							"options" => $alt_stylesheets);
							
		$options[] = array( "name" => "Custom CSS",
							"desc" => "Quickly add some CSS to your theme by adding it to this block.",
							"id" => $shortname."_custom_css",
							"std" => "",
							"type" => "textarea");

$options[] = array( "name" => "Categories",
					"type" => "heading");

		$options[] = array( "name" => "Featured Slider",
							"desc" => "Select a category for featured slider.",
							"id" => $shortname.$themeid."_fea_cat",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
							
		$options[] = array( "desc" => "Display posts assigned this tag to be listed on featured slider. <br/> [Note: Category will be disregarded if a tag name is filled in].",
							"id" => $shortname.$themeid."_fea_tag",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 
	
		$options[] = array( "desc" => "Display most recent post entries on featured slider instead of category or tag.",
							"id" => $shortname.$themeid."_fea_recent",
							"std" => "false",
							"type" => "checkbox");		

		$options[] = array( "desc" => "Number of posts to display on featured slider. [select 0 to disable section]",
							"id" => $shortname.$themeid."_fea_nr",
							"std" => "5",
							"type" => "select",
							"class" => "mini",
							"options" => $options_feanr);							
				
		$options[] = array( "name" => "Below slider left column",
							"desc" => "Select a category for entries below featured slider left block.",
							"id" => $shortname.$themeid."_cat_name1",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Number of posts to display below featured slider on left block.",
							"id" => $shortname.$themeid."_post_count1",
							"std" => "4",
							"class" => "mini",
							"type" => "text"); 
							
		$options[] = array( "name" => "Featured tab #1",
							"desc" => "Select a category for entries below featured slider.",
							"id" => $shortname.$themeid."_cat_name2",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Caption title for featured slider #1 <br />[If empty, selected category name will be used as caption].",
							"id" => $shortname.$themeid."_tabname2",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 

		$options[] = array( "name" => "Featured tab #2",
							"desc" => "Select a category for entries below featured slider.",
							"id" => $shortname.$themeid."_cat_name3",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Caption title for featured slider #2 <br />[If empty, selected category name will be used as caption].",
							"id" => $shortname.$themeid."_tabname3",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 	

		$options[] = array( "name" => "Featured tab #3",
							"desc" => "Select a category for entries below featured slider.",
							"id" => $shortname.$themeid."_cat_name4",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Caption title for featured slider #3 <br />[If empty, selected category name will be used as caption].",
							"id" => $shortname.$themeid."_tabname4",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 	

		$options[] = array( "name" => "Featured tab #4",
							"desc" => "Select a category for entries below featured slider.",
							"id" => $shortname.$themeid."_cat_name5",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Caption title for featured slider #4 <br />[If empty, selected category name will be used as caption].",
							"id" => $shortname.$themeid."_tabname5",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 	

		$options[] = array( "name" => "Featured tab #5",
							"desc" => "Select a category for entries below featured slider.",
							"id" => $shortname.$themeid."_cat_name6",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Caption title for featured slider #5 <br />[If empty, selected category name will be used as caption].",
							"id" => $shortname.$themeid."_tabname6",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 				
							
		$options[] = array( "name" => "Below tabs left column",
							"desc" => "Select a category for entries below tabbed section left block.",
							"id" => $shortname.$themeid."_cat_name7",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Number of posts to display with thumbnail + excerpt below featured.",
							"id" => $shortname.$themeid."_post_count7",
							"std" => "1",
							"class" => "mini",
							"type" => "text"); 	
							
		$options[] = array( "desc" => "Number of headlines (no thumbnail, no excerpt) to display.",
							"id" => $shortname.$themeid."_post_count7a",
							"std" => "2",
							"class" => "mini",
							"type" => "text"); 	
							
		$options[] = array( "name" => "Below tabs right column",
							"desc" => "Select a category for entries below tabbed section right block.",
							"id" => $shortname.$themeid."_cat_name8",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Number of posts to display with thumbnail + excerpt below featured.",
							"id" => $shortname.$themeid."_post_count8",
							"std" => "1",
							"class" => "mini",
							"type" => "text"); 	
							
		$options[] = array( "desc" => "Number of headlines (no thumbnail, no excerpt) to display.",
							"id" => $shortname.$themeid."_post_count8a",
							"std" => "2",
							"class" => "mini",
							"type" => "text"); 	
							
		$options[] = array( "name" => "Media slider category",
							"desc" => "Category for media slider on front page.",
							"id" => $shortname.$themeid."_cat_media",
							"std" => "1",
							"type" => "select2",
							"options" => $of_categories);
													
		$options[] = array( "desc" => "Number of posts to display on media slider.",
							"id" => $shortname.$themeid."_postmedia_nr",
							"std" => "8",
							"class" => "mini",
							"type" => "text"); 							
							
		$options[] = array(	"desc" => "ID number of cat(s) to use media gallery template for (seperate with comma if more than 1 category is entered)",
							"id" => $shortname.$themeid."_media_temp",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 					
							
$options[] = array( "name" => "Sliders",
				"type" => "heading");
								
		$options[] = array( "name" => "Featured Slider",
							"desc" => "Enable auto rotation on featured slider.",
							"id" => $shortname.$themeid."_fea_rotate",
							"std" => "false",
							"type" => "checkbox");			
														
		$options[] = array( "desc" => "If auto rotation is enabled, define the pause time between 2 slides. [in seconds]",
							"id" => $shortname.$themeid."_fea_pause",
							"std" => "5",
							"class" => "mini",
							"type" => "text");

		$options[] = array( "desc" => "Change post when navigation link is clicked or hovered.",
							"id" => $shortname.$themeid."_fea_reveal",
							"std" => "OnClick",
							"type" => "select",
							"class" => "mini",
							"options" => $options_revealtype);

		$options[] = array( "name" => "Mainpage media gallery slider",
							"desc" => "Enable auto rotation on media gallery slider.",
							"id" => $shortname.$themeid."_media_rotate",
							"std" => "false",
							"type" => "checkbox");			
														
		$options[] = array( "desc" => "Pause time: between 2 consecutive slides. [in seconds]",
							"id" => $shortname.$themeid."_media_pause",
							"std" => "5",
							"class" => "mini",
							"type" => "text");
							
		$options[] = array( "desc" => "Specify the number of items to scroll. Value 2 will scroll 2 items at a time.",
							"id" => $shortname.$themeid."_media_scroll",
							"std" => "2",
							"class" => "mini",
							"type" => "text");
							
		$options[] = array( "desc" => "Rotation Speed: The speed of rotation when slider scrolls. [in seconds]",
							"id" => $shortname.$themeid."_media_speed",
							"std" => "2",
							"class" => "mini",
							"type" => "text");
	
											
		$options[] = array( "name" => "Inner-Page Slider",
							"desc" => "Automatically create slideshow of uploaded photos in post entries to be displayed below post title. [Note: Select options include displaying slider site-wide, tag-based, or to disable completely].",
							"id" => $shortname.$themeid."_inslider",
							"std" => "Disable",
							"type" => "select",
							"class" => "mini",
							"options" => $options_inslider);
							
		$options[] = array( "desc" => "If tag-based option is selected, display posts assigned this tag to be shown in inner-page slider. <br/> [Note: Posts with multiple image attachments and tagged with this key will display within slider].",
							"id" => $shortname.$themeid."_inslider_tag",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 
							
		$options[] = array( "desc" => "Enable auto rotation for innerpage slider.",
							"id" => $shortname.$themeid."_inner_rotate",
							"std" => "false",
							"type" => "checkbox");	
							
		$options[] = array( "desc" => "(If auto rotate enabled) define pause time between 2 slides. [in seconds]",
							"id" => $shortname.$themeid."_inner_pause",
							"std" => "5",
							"class" => "mini",
							"type" => "text");
							
$options[] = array( "name" => "Navigation",
				"type" => "heading");			

		$options[] = array( "name" => "Custom Navigation",
							"desc" => "Replace masthead navigation with a custom menu. [If selected, create a <a href='nav-menus.php' target='_blank'>custom menu</a>]",
							"id" => $shortname.$themeid."_nav_masthead",
							"std" => "false",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Replace category navigation with a custom menu. [If selected, create a <a href='nav-menus.php' target='_blank'>custom menu</a>]",
							"id" => $shortname.$themeid."_nav_cats",
							"std" => "false",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Replace page navigation with a custom menu. [If selected, create a <a href='nav-menus.php' target='_blank'>custom menu</a>]",
							"id" => $shortname.$themeid."_nav_pages",
							"std" => "false",
							"type" => "checkbox");
							
		$options[] = array( "name" => "Sort Categories",
							"desc" => "Display categories in ascending or descending order",
							"id" => $shortname.$themeid."_sort_cats",
							"std" => "Disable",
							"type" => "select",
							"class" => "mini",
							"options" => $options_sort);
							
		$options[] = array( "name" => "Order Categories",
							"desc" => "Display categories in alphabetical order, by category ID, or by the count of posts",
							"id" => $shortname.$themeid."_order_cats",
							"std" => "name",
							"type" => "select",
							"class" => "mini",
							"options" => $options_order);
							
		$options[] = array( "name" => "Exclude Categories",
							"desc" => "ID number of cat(s) to exclude from navigation (eg 1,2,3,4) <a href='http://www.gabfirethemes.com/how-to-check-category-ids/' target='_blank'>How check category/page ID</a>",
							"id" => $shortname.$themeid."_ex_cats",
							"std" => "",
							"class" => "mini",
							"type" => "text"); 
							
		$options[] = array( "name" => "Exclude Pages",
							"desc" => "ID number of page(s) to exclude from navigation (eg 1,2,3,4) <a href='http://www.gabfirethemes.com/how-to-check-category-ids/' target='_blank'>How check category/page ID</a>",
							"id" => $shortname.$themeid."_ex_pages",
							"std" => "",
							"class" => "mini",
							"type" => "text");
							
$options[] = array( "name" => "Media",
				"type" => "heading");

		$options[] = array( "name" => "Catch First Image",
							"desc" => "If enabled, built-in theme functions will scan post from top to bottom, catch the first image, and auto-generate a thumbnail for posts that do not have an image attached or custom field defined.",
							"id" => $shortname.$themeid."_catch_img",
							"std" => "false",
							"type" => "checkbox");

		$options[] = array( "name" => "Default 'No Image Found' photo",
							"desc" => "Enable on Featured slider",
							"id" => $shortname.$themeid."_enfea1",
							"std" => "true",
							"type" => "checkbox");

		$options[] = array( "desc" => "Enable on navigation of featured slider",
							"id" => $shortname.$themeid."_enfea2",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable on primary ajax tab #1",
							"id" => $shortname.$themeid."_enfea3",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable on primary ajax tab #2",
							"id" => $shortname.$themeid."_enfea4",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable on primary ajax tab #3",
							"id" => $shortname.$themeid."_enfea5",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable on primary ajax tab #4",
							"id" => $shortname.$themeid."_enfea6",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable on primary ajax tab #5",
							"id" => $shortname.$themeid."_enfea7",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable below ajax tabs on left block",
							"id" => $shortname.$themeid."_enfea8",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable below ajax tabs on right block",
							"id" => $shortname.$themeid."_enfea9",
							"std" => "true",
							"type" => "checkbox");
							
		$options[] = array( "desc" => "Enable on media slider",
							"id" => $shortname.$themeid."_enfea10",
							"std" => "true",
							"type" => "checkbox");
							
$options[] = array( "name" => "Ad Management",
				"type" => "heading");							
							
		$options[] = array( "name" => "728 (or 468) ad on header",
							"desc" => "Ad code for header",
							"id" => $shortname.$themeid."_header",
							"std" => "",
							"type" => "textarea"); 
							
		$options[] = array( "name" => "300x250 sidebar",
							"desc" => "300x250 sidebar top ad section",
							"id" => $shortname.$themeid."_sidebar_top",
							"std" => "",
							"type" => "textarea"); 
			
		$options[] = array( "name" => "300x250 sidebar",
							"desc" => "300x250 sidebar bottom ad section",
							"id" => $shortname.$themeid."_sidebar_bottom",
							"std" => "",
							"type" => "textarea"); 
							
		$options[] = array( "name" => "468x60 ad on post page",
							"desc" => "468x60 banner below enty on post pages",
							"id" => $shortname.$themeid."_singlepage",
							"std" => "",
							"type" => "textarea"); 
			
$options[] = array( "name" => "Footer Options",
				"type" => "heading");

		$options[] = array( "name" => "Enable Custom Footer (Left)",
							"desc" => "Activate to add the custom text below to the theme footer.",
							"id" => $shortname.$themeid."_footer_left",
							"std" => "false",
							"type" => "checkbox");    

		$options[] = array( "name" => "Custom Text (Left)",
							"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
							"id" => $shortname.$themeid."_footer_left_text",
							"std" => "",
							"type" => "textarea");
								
		$options[] = array( "name" => "Enable Custom Footer (Right)",
							"desc" => "Activate to add the custom text below to the theme footer.",
							"id" => $shortname.$themeid."_footer_right",
							"std" => "false",
							"type" => "checkbox");    

		$options[] = array( "name" => "Custom Text (Right)",
							"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
							"id" => $shortname.$themeid."_footer_right_text",
							"std" => "",
							"type" => "textarea");
							
$options[] = array( "name" => "Miscellaneous",
					"type" => "heading");	
						
		$options[] = array( "name" => "Facebook",
							"desc" => "Link to Facebook account. <br/> [http://www.facebook.com/url]",
							"id" => $shortname.$themeid."_facebook",
							"std" => "",
							"type" => "text"); 
							
		$options[] = array( "name" => "Twitter",
							"desc" => "Link to Twitter Account. <br/> [http://www.twitter.com/username]",
							"id" => $shortname.$themeid."_twitter",
							"std" => "",
							"type" => "text"); 
							
			$options[] = array( "name" => "Subscribe via Email",
							"desc" => "Email subscribe link. <br/> [http://feeds.feedburner.com/feedname]",
							"id" => $shortname.$themeid."_feedburner",
							"std" => "",
							"type" => "text"); 
							
			$options[] = array( "name" => "Display post author",
							"desc" => "Display name of post author before excerpts on front page with a link to author archive",
							"id" => $shortname.$themeid."_post_author",
							"std" => "false",
							"type" => "checkbox");		

			$options[] = array( "name" => "Display post date",
							"desc" => "Display the date of post before excerpts on front page",
							"id" => $shortname.$themeid."_post_date",
							"std" => "false",
							"type" => "checkbox");
							
			$options[] = array( "name" => "Post Meta",
							"desc" => "Display post meta below entries on single post pages",
							"id" => $shortname.$themeid."_entry_meta",
							"std" => "false",
							"type" => "checkbox");
							
			$options[] = array( "name" => "Short link",
							"desc" => "Display short link below the posts",
							"id" => $shortname.$themeid."_short_url",
							"std" => "false",
							"type" => "checkbox");
							
			$options[] = array( "name" => "Widget Map",
								"desc" => "Display the location of widgets on front page. After checking widget locations <strong>be sure to disable that option</strong>",
								"id" => $shortname.$themeid."_widget",
								"std" => "false",
								"type" => "checkbox");
							
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);
}
}
?>