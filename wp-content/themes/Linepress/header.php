<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php 
	global $page, $paged;
	if ( is_home() ) { bloginfo('name'); echo ' | '; bloginfo('description'); } 
	elseif ( is_search() ) { bloginfo('name'); echo ' | '; _e('Search Results', 'linepress');  }  
	elseif ( is_author() ) { bloginfo('name'); echo ' | '; _e('Author Archives', 'linepress');  }
	elseif ( is_page() ) {  bloginfo('name'); echo ' | '; wp_title('');  }
	elseif ( is_single() ) { wp_title(''); echo ' | '; bloginfo('name');  }
	elseif ( is_category() ) { bloginfo('name'); echo ' | '; _e('Archive', 'linepress'); echo ' | '; single_cat_title();  } 
	elseif ( is_month() ) { bloginfo('name'); echo ' | '; _e('Archive', 'linepress'); echo ' | '; the_time('F');  }	
	elseif ( is_tag() ) {  bloginfo('name'); echo ' | '; _e('Tag Archive', 'linepress'); echo ' | ';  single_tag_title("", true); }     
	else { wp_title(''); echo ' | '; bloginfo('name');  }	

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __('%s'), max( $paged, $page ) );	
?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<?php if(file_exists(TEMPLATEPATH . '/custom.css')) { ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/custom.css" />
	<?php } ?>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('of_rssaddr') <> "" ) { echo get_option('of_rssaddr'); } else { echo bloginfo('rss2_url'); } ?>" />	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>	
</head>

<body <?php body_class() ?>>

<div id="wrapper">

	<div id="header">	
		<div id="masthead">
			<?php
				if(get_option('of_ln_nav_masthead') == 'true') { 
					wp_nav_menu( array('theme_location' => 'masthead', 'container' => false, 'menu_class' => 'mastheadnav dropdown' ));
				} else { ?>
					<ul class="mastheadnav dropdown">
						<?php wp_list_pages('sort_column=menu_order&title_li=&exclude='. get_option('of_ln_ex_pages')); ?>
					</ul>
			 <?php } ?>	
			 
			<div id="search">
				<?php get_search_form(); ?>
			</div><!-- /search -->
			<div class="clear"></div>
		</div>
		
		<?php if(get_option('of_header_type') == 'singleimage') { ?>
			<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>">
				<img src="<?php echo get_option('of_himageurl'); ?>" id="header_banner" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
			</a>
		<?php } else { ?>
		
		<div id="logo" style="padding:<?php echo get_option('of_padding_top'); ?>px 0 <?php echo get_option('of_padding_bottom'); ?>px <?php echo get_option('of_padding_left'); ?>px;">
		
			<?php 
			if ( get_option('of_logo_type') == 'Image Based Logo') { ?>
				<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>">
					<img src="<?php echo get_option('of_logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
				</a>
			<?php } else { ?>
				<h1>
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
						<?php bloginfo('name'); ?>
						<span><?php bloginfo('description'); ?></span>
					</a>
				</h1>
			<?php } ?>
		</div><!-- /logo -->
		
		<div id="banner">
			<?php
				if(file_exists(TEMPLATEPATH . '/ads/header_468x60/'. current_catID() .'.php') && (is_single() || is_category())) {
					include_once(TEMPLATEPATH . '/ads/header_468x60/'. current_catID() .'.php');
				}
				else {
					include_once(TEMPLATEPATH . '/ads/header_468x60.php');
				}
			?>
		</div>
			
		<?php } ?>
			<div class="clear"></div>		
		
		<div id="mainmenu">
			<?php
				if(get_option('of_ln_nav_cats') == 'true') { 
					wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_class' => 'mainnav dropdown' ));
				} else { ?>
					<ul class="mainnav dropdown">
						<li <?php if(is_home() ) { ?>class="current-cat"<?php } ?>><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','linepress'); ?></a></li>
						<?php wp_list_categories('orderby='. get_option('of_ln_order_cats') .'&order='. get_option('of_ln_sort_cats') .'&title_li=&exclude='. get_option('of_ln_ex_cats')); ?>
					</ul>
				<?php 
				} 
			?>
			<div class="clear"></div>
		</div>
		
		<div id="submenu">
			<?php
				if(get_option('of_ln_nav_pages') == 'true') { 
					wp_nav_menu( array('theme_location' => 'secondary-navigation', 'container' => false, 'menu_class' => 'subnav dropdown' ));
				} else { ?>
					<ul class="subnav dropdown">
						<li><a class="gab_rss" href="<?php if ( get_option('of_rssaddr') <> "" ) { echo get_option('of_rssaddr'); } else { echo bloginfo('rss2_url'); } ?>" rel="nofollow" title="<?php esc_attr_e('Subscribe to latest posts in RSS','linepress'); ?>"><?php _e('RSS for Entries','linepress'); ?></a></li>
						
						<?php if ( get_option('of_ln_feedburner') <> "" ) { ?>
							<li><a class="gab_email" href="<?php echo get_option('of_ln_feedburner'); ?>" rel="nofollow" title="<?php esc_attr_e('Subscribe to latest posts via email','linepress'); ?>"><?php _e('Subscribe via E-mail','linepress'); ?></a></li>
						<?php } ?>
						
						<?php if ( get_option('of_ln_twitter') <> "" ) { ?>
							<li><a class="gab_twitter" href="<?php echo get_option('of_ln_twitter'); ?>" rel="nofollow" title="<?php esc_attr_e('follow on twitter','linepress'); ?>"><?php _e('Follow on Twitter','linepress'); ?></a></li>
						<?php } ?>
						
						<?php if ( get_option('of_ln_facebook') <> "" ) { ?>
							<li><a class="gab_facebook" href="<?php echo get_option('of_ln_facebook'); ?>" rel="nofollow" title="<?php esc_attr_e('Connect on facebook','linepress'); ?>"><?php _e('Connect on Facebook','linepress'); ?></a></li>
						<?php } ?>
						
						<li class="date">
							<script type="text/javascript">
								var mydate=new Date()
								var year=mydate.getYear()
								if (year < 1000)
								year+=1900
								var day=mydate.getDay()
								var month=mydate.getMonth()
								var daym=mydate.getDate()
								if (daym<10)
								daym="0"+daym
								var dayarray=new Array("<?php _e('Sunday','linepress'); ?>","<?php _e('Monday','linepress'); ?>","<?php _e('Tuesday','linepress'); ?>","<?php _e('Wednesday','linepress'); ?>","<?php _e('Thursday','linepress'); ?>","<?php _e('Friday','linepress'); ?>","<?php _e('Saturday','linepress'); ?>")
								var montharray=new Array("<?php _e('January','linepress'); ?>","<?php _e('February','linepress'); ?>","<?php _e('March','linepress'); ?>","<?php _e('April','linepress'); ?>","<?php _e('May','linepress'); ?>","<?php _e('June','linepress'); ?>","<?php _e('July','linepress'); ?>","<?php _e('August','linepress'); ?>","<?php _e('September','linepress'); ?>","<?php _e('October','linepress'); ?>","<?php _e('November','linepress'); ?>","<?php _e('December','linepress'); ?>")
								document.write(""+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"")
							</script>
						</li>
					</ul>
				<?php 
				} 
			?>	
			<div class="clear"></div>			 
		</div>
		<div class="clear"></div>
	</div><!-- /header -->