<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php if ( is_archive() ) { _e('Category '); } wp_title('-', true, 'right'); bloginfo('name'); ?></title> 
<meta name="description" content="<?php echo get_option('metadesc'); ?>" />
<meta name="keywords" content="<?php echo get_option('metakey'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php echo get_option('favicon'); ?>" />
    <link rel="shortcut icon" href="<?php echo get_option('favicon'); ?>" type="image/x-icon" />
    <meta name="generator" content="Magazine3 Framework Version 3.0" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ddsmoothmenu.js"></script> 
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tools.min.js"></script>
 <script type="text/javascript">
var $ = jQuery.noConflict();
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
</script>
 <script type="text/javascript">
$(document).ready(function() {
	//Tooltips
	$(".tip_trigger").hover(function(){
		tip = $(this).find('.tip');
		tip.show(); //Show tooltip
	}, function() {
		tip.hide(); //Hide tooltip		  
	}).mousemove(function(e) {
		var mousex = e.pageX + 20; //Get X coodrinates
		var mousey = e.pageY + 20; //Get Y coordinates
		var tipWidth = tip.width(); //Find width of tooltip
		var tipHeight = tip.height(); //Find height of tooltip
		
		//Distance of element from the right edge of viewport
		var tipVisX = $(window).width() - (mousex + tipWidth);
		//Distance of element from the bottom of viewport
		var tipVisY = $(window).height() - (mousey + tipHeight);
		  
		if ( tipVisX < 20 ) { //If tooltip exceeds the X coordinate of viewport
			mousex = e.pageX - tipWidth - 20;
		} if ( tipVisY < 20 ) { //If tooltip exceeds the Y coordinate of viewport
			mousey = e.pageY - tipHeight - 20;
		} 
		tip.css({  top: mousey, left: mousex });
	});
});

</script>
	 <script type="text/javascript">
 $(document).ready(function() {

 $("div.scrollable").scrollable({

		size: 3,
		items: '#thumbs',   
		hoverClass: 'hover',
		speed: 400,
		keyboard: false,
		clickable: false

	}).navigator();	
	  
  		
});
</script>
  
 <script type="text/javascript">   

  // when the DOM is ready...        

$(document).ready(function () {      

  // load the ticker                 

	createTicker();                    

});                                  

function createTicker(){             

	// put all list elements within #ticker-area into array   

	var tickerLIs = $("#ticker-area ul").children();          

	tickerItems = new Array();                                

	tickerLIs.each(function(el) {                             

		tickerItems.push( jQuery(this).html() );                

	});                                                       

	i = 0                                                     

	rotateTicker();                                           

}                                                           

function rotateTicker(){                                    

	if( i == tickerItems.length ){                            

	  i = 0;                                                  

	}                                                         

  tickerText = tickerItems[i];                              

	c = 0;                                                    

	typetext();                                               

	setTimeout( "rotateTicker()", 5000 );                     

	i++;                                                      

}                                                           

var isInTag = false;                                        

function typetext() {	                                      

	var thisChar = tickerText.substr(c, 1);                   

	if( thisChar == '<' ){ isInTag = true; }                  

	if( thisChar == '>' ){ isInTag = false; }                 

	$('#ticker-area').html("&nbsp;" + tickerText.substr(0, c++));   

	if(c < tickerText.length+1)                                     

		if( isInTag ){                                                

			typetext();                                                 

		}else{                                                        

			setTimeout("typetext()", 28);                               

		}                                                             

	else {                                                          

		c = 1;                                                        

		tickerText = "";                                              

	}	                                                              

}                                                                 

  </script> 
			
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
 <?php if ( is_single()){ ?>
   <style>#content .post {
    border: none !important; </style> 
 <?php } ?>
  	<?php wp_head(); ?>  
      <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css' />
       <link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css' />
       <link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold&subset=latin' rel='stylesheet' type='text/css' />
       <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
 

<?php echo get_option('hscript'); ?>
<?php if ( is_singular() ) { ?><link rel="canonical" href="<?php the_permalink(); ?>" /><?php } ?>

</head>

<body>

<div id="wrapper">

	<header><div id="topmenu">
<div id="topmenuleft">
			<?php wp_nav_menu( array( 'walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'main-menu', 'container_id' => 'topMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );?>
</div>
<div id="topmenuright">
 <ul>
 <li id="rssb">
 <?php echo date('D, M Y'); ?>
 </li>
 <li class="rssnav"><a href="<?php echo get_option('feedlink'); ?>">RSS</a></li>
 <li><a href="<?php echo get_option('feedemail'); ?>">Newsletter</a></li>
 </ul>
</div>
</div>
	 
     <div id="logowrap">
     <div id="logo"><a href="<?php echo get_option('home'); ?>"><img src="<?php echo get_option('logo'); ?>" alt="<?php echo get_option('logoalt'); ?>" /></a></div>
     <div id="logohead">
     <div id="headad"> <?php if(get_option('ad1ok')!="yes"):?><?php endif?> 
    <?php if(get_option('ad1ok')!="no"):?><?php echo get_option('ad1'); ?><?php endif?> 
     </div>
     <div id="twfb">
     <ul>   <li>  <a href="<?php echo get_option('facebooklink'); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Become a Fan!" /></a></li>
 <li> 
   <a href="http://twitter.com/<?php echo get_option('twitterlink'); ?>" class="tip_trigger"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Follow On Twitter" /><span class="tip">    <ul id="twitter_update_list">
    </ul>
    <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script><script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo get_option('twitterlink'); ?>.json?callback=twitterCallback2&count=1"></script>

</span></a>
     </li>
   
      <li> <a href="<?php echo get_option('feedlink'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rssicon.png" alt="Subcribe to Our RSS Feed" /></a></li>
     </ul>
     </div>
     </div>
     <div id="cb"></div>
     </div>    <div id="cb"></div>
		<nav>
	<div id="navigation">
			<?php wp_nav_menu( array( 'walker' => new Arrow_Walker_Nav_Menu, 'theme_location' => 'second', 'container_id' => 'nav', 'container_class' => 'ddsmoothmenu1', 'fallback_cb'=>'secondarymenu') );?>
</div>
		</nav>
      
	 
	</header>