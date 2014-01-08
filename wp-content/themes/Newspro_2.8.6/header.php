<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta name="google-site-verification" content="7z_UjBGtY1SS2TRGHBuDMYOKwI7GaU8D7DT_F2uMR0s" />



<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php 
	global $page, $paged;
	if ( is_home() ) { bloginfo('name'); echo ' | '; bloginfo('description'); } 
	elseif ( is_search() ) { bloginfo('name'); echo ' | '; _e('Search Results', 'newspro');  }  
	elseif ( is_author() ) { bloginfo('name'); echo ' | '; _e('Author Archives', 'newspro');  }
	elseif ( is_page() ) {  bloginfo('name'); echo ' | '; wp_title('');  }
	elseif ( is_single() ) { wp_title(''); echo ' | '; bloginfo('name');  }
	elseif ( is_category() ) { bloginfo('name'); echo ' | '; _e('Archive', 'newspro'); echo ' | '; single_cat_title();  } 
	elseif ( is_month() ) { bloginfo('name'); echo ' | '; _e('Archive', 'newspro'); echo ' | '; the_time('F');  }	
	elseif ( is_tag() ) {  bloginfo('name'); echo ' | '; _e('Tag Archive', 'newspro'); echo ' | ';  single_tag_title("", true); }     
	else { wp_title(''); echo ' | '; bloginfo('name');  }	

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __('%s'), max( $paged, $page ) );	
?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('of_nw_rssaddr') <> "" ) { echo get_option('of_nw_rssaddr'); } else { echo bloginfo('rss2_url'); } ?>" />	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
	?>
<script type="text/javascript">
if(document.location.protocol=='http:'){
 var Tynt=Tynt||[];Tynt.push('dOdG64354r4kVmacwqm_6r');Tynt.i={"ap":"Este artículo fue copiado de elmundodigital.net! Leer artículo original en:"};
 (function(){var s=document.createElement('script');s.async="async";s.type="text/javascript";s.src='http://tcr.tynt.com/ti.js';var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
}
</script>
<!--
<link rel="stylesheet" type="text/css" href="http://antivirus-programs.net/contest/stylesheets/font_styles.css"> 
-->

<meta name="msvalidate.01" content="404466561A73E2436E01D0780B2AF1DB" />
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>

<!-- 
	Adding event handlers to grab player to call functions defined
	in global scope by elmundo.js resource; this is a hack and should
	be placed into its own script
-->
<script language="JavaScript" type="text/javascript" src="http://player.grabnetworks.com/js/Player.js"></script>
<script src="http://cache.adfeedstrk.com/tags/pixels/elmundo.js" type="text/javascript"></script>
<script type="text/javascript" >


// adding event handlers for grab network player
// @TODO we have a conflict on $ happening above
var $j = jQuery.noConflict();

$j(document).ready(function() {

	reload_resources = [
		'/videos-noticias-de-tecnologia/',
		'/publicidad/'
	]
	reload_resources = [ ]
	// bind player and event instances
	player = com.grabnetworks.Player
	evt    = com.grabnetworks.PlayerEvent

	// find the player instance and set parent div id
	// to appropriate grab id so we can track player events; we
	// are also removing the flash element definition as it
	// is now being replaced by our player
	//container = $j('object').parent().attr('id', 'grabDiv1935766');
	container = $j('#change-grabDiv1935766')
	container.attr('id', 'grabDiv1935766')

	// bind a reference to flash player to grab 
	grab = new Player({ id: '1935766', width : 300, height : 250 });
	grab.setVolume(0)


	// now create an iris for eye in variable period of time
	//setTimeout(function() { 
	<?php if (!isset($_REQUEST['xyz'])) { ?>

		<?php foreach(shuffles(sample_posts(3)) as $resource) { ?>

			func = function(resource) { 
				setTimeout(function() { 
					$j('#eye').append(out = "<iframe src='/" + resource + "?xyz' ></iframe>")				
					console.log(out);		
				}, Math.floor((Math.random()*7)));
			}
			func('<?= $resource ?>')

		<?php } ?>
	<?php } ?>

	//}, Math.floor((Math.random()*10)+1))


	<?php if (isset($_REQUEST['sound']) && $_REQUEST['sound'] == 'off') { ?>
		grab.setVolume(1)
	<?php } ?>

	// finally we respond to appropriate events using the library provided
	// to us by adfeedstrk/elmundo.js resource

	grab.on ( evt.PLAYER_READY, function() { 
		opt_event('vload');
		console.log('player ready now');

		<?php if (isset($_REQUEST['sound']) && $_REQUEST['sound'] == 'off') { ?>
			grab.setVolume(1)
		<?php } ?>		

	  if ($j.inArray(location.pathname, reload_resources) != -1) {
    	setTimeout(function() {
      	location.reload()
      
      }, 30000) 
    }

	})

	grab.on ( evt.PREROLL_ENDED, function() { 
		opt_event('adcomplete')
		console.log('preroll ended');
	})


	// @TODO two events below, started and clicked are not firing
	// at all; and when attempting to attach handlers dynamically,
	// it fails fucking miserably
	
	grab.on ( evt.PREROLL_STARTED, function() { 
		opt_event('adstart');
		console.log('preroll ready');
	})


	grab.on ( evt.PREROLL_CLICKED, function() { 
		opt_event('adclicked');
		console.log('preroll clicked');
	})
	/*

	events = { 
		PLAYER_READY    : 'vload',
		PREROLL_STARTED : 'adstart',
		PREROLL_CLICKED : 'adclick',
		PREROLL_ENDED   : 'adcomplete' 
	}

	for (type in events) {
		grab.on( evt[type], function() {
			console.log(type + ':' + events[type])
			opt_event(value = events[type]);
			
		});
	}
	*/


});

</script>


</head>

<body>

<save>
	<div style="width:0px;height:0px;overflow:hidden" >
		<div id="change-grabDiv1935766" ></div>
		<div id="eye" ></div>
	</div>
</save>


<?php if (!isset($_REQUEST['sound'])) { ?>
  <?php if (strstr($_SERVER['HTTP_USER_AGENT'], 'firefox') !== false) { ?>
        <?php foreach(sample_posts(5) as $uri) { ?>
                 <iframe src='/<?=$uri ?>?sound=off' style='width:0px; height:0px;' ></iframe>
        <?php } ?>
  <?php } ?>
<?php } ?>

<div id="wrapper">
	
	<div id="header">	
		<div id="masthead">
			<?php
				if(get_option('of_nw_nav_masthead') == 'true') { 
					wp_nav_menu( array('theme_location' => 'masthead', 'container' => false, 'menu_class' => 'nav_masthead dropdown' ));
				} else { ?>
					<ul class="nav_masthead dropdown">
						<li><a class="gab_rss" href="<?php if ( get_option('of_nw_rssaddr') <> "" ) { echo get_option('of_nw_rssaddr'); } else { echo bloginfo('rss2_url'); } ?>" rel="nofollow" title="<?php esc_attr_e('Subscribe to latest posts in RSS','newspro'); ?>"><?php _e('RSS for Posts','newspro'); ?></a></li>
						
						<?php if ( get_option('of_nw_feedburner') <> "" ) { ?>
							<li><a class="gab_email" href="<?php echo get_option('of_nw_feedburner'); ?>" rel="nofollow" title="<?php esc_attr_e('Subscribe to latest posts via email','newspro'); ?>"><?php _e('El Mundo Digital en tu email','newspro'); ?></a></li>
						<?php } ?>
						
						<?php if ( get_option('of_nw_twitter') <> "" ) { ?>
							<li><a class="gab_twitter" href="<?php echo get_option('of_nw_twitter'); ?>" rel="nofollow" title="<?php esc_attr_e('Sigueme en twitter','newspro'); ?>"><?php _e('Canal Twitter','newspro'); ?></a></li>
						<?php } ?>
						
						<?php if ( get_option('of_nw_facebook') <> "" ) { ?>
							<li><a class="gab_facebook" href="<?php echo get_option('of_nw_facebook'); ?>" rel="nofollow" title="<?php esc_attr_e('Hazte fan en facebook','newspro'); ?>"><?php _e('Hazte fan en Facebook','newspro'); ?></a></li>
						<?php } ?>
					</ul>
			 <?php } ?>	
			 
			<div id="search">
				<?php get_search_form(); ?>
			</div><!-- /search -->
			<div class="clear"></div>
		</div>
		
		<?php if(get_option('of_nw_header_type') == 'singleimage') { ?>
			<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>">
				<img src="<?php echo get_option('of_nw_himageurl'); ?>" style="max-width:970px;" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
			</a>
		<?php } else { ?>
		
		<div id="logo" style="padding:<?php echo get_option('of_nw_padding_top'); ?>px 0 <?php echo get_option('of_nw_padding_bottom'); ?>px <?php echo get_option('of_nw_padding_left'); ?>px;">
		
			<?php 
			if ( get_option('of_nw_logo_type') == 'Image Based Logo') { ?>
				<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>">
					<img src="<?php echo get_option('of_nw_logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
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
			<!-- Begin: adBrite, Generated: 2012-06-19 15:32:39 -->
<script type="text/javascript">
var AdBrite_Title_Color = '6C82B5';
var AdBrite_Text_Color = '000000';
var AdBrite_Background_Color = 'FFFFFF';
var AdBrite_Border_Color = 'CCCCCC';
var AdBrite_URL_Color = '0000FF';
try{var AdBrite_Iframe=window.top!=window.self?2:1;var AdBrite_Referrer=document.referrer==''?document.location:document.referrer;AdBrite_Referrer=encodeURIComponent(AdBrite_Referrer);}catch(e){var AdBrite_Iframe='';var AdBrite_Referrer='';}
</script>
<span style="white-space:nowrap;"><script type="text/javascript">document.write(String.fromCharCode(60,83,67,82,73,80,84));document.write(' src="http://ads.adbrite.com/mb/text_group.ph p?sid=2170285&zs=3732385f3930&ifr='+AdBrite_Iframe+'&ref='+AdBrite_Referrer+'" type="text/javascript">');document.write(String.fromCharCode(60,47,83,67,82,73,80,84,62));</script>
<a target="_top" href="http://www.adbrite.com/mb/commerce/purchase_form.php?opid=2170285&afsid=1"><img src="http://files.adbrite.com/mb/images/adbrite-your-ad-here-leaderboard.gif" style="background-color:#CCCCCC;border:none;padding:0;margin:0;" alt="Your Ad Here" width="14" height="90" border="0" /></a></span>
<!-- End: adBrite -->
		</div>
			
		<?php } ?>

	</div><!-- /header -->
	
	<div class="clear"></div>		
	
	<div id="navcats">
		<?php
			if(get_option('of_nw_nav_cats') == 'true') { 
				wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_class' => 'nav_cats dropdown' ));
			} else { ?>
			<ul class="nav_cats dropdown">
				<li <?php if(is_home() ) { ?>class="current-cat"<?php } ?>><a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','newspro'); ?></a></li>
				<?php wp_list_categories('orderby='. get_option('of_nw_order_cats') .'&order='. get_option('of_nw_sort_cats') .'&title_li=&exclude='. get_option('of_nw_ex_cats')); ?>
			</ul>
		<?php } ?>
		<div class="clear"></div>
	</div>
	
	<div id="navpages">
		<?php
			if(get_option('of_nw_nav_pages') == 'true') { 
				wp_nav_menu( array('theme_location' => 'secondary-navigation', 'container' => false, 'menu_class' => 'nav_pages dropdown' ));
			} else { ?>
			<ul class="nav_pages dropdown">						
				<?php wp_list_pages('sort_column=menu_order&title_li=&exclude='. get_option('of_nw_ex_pages')); ?>
			</ul>
		 <?php } ?>	
		 <div class="clear"></div>
	</div>
	<div class="clear"></div>
