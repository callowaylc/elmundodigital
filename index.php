<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */
header("Cache-Control: must-revalidate, max-age=300");
header("Vary: Accept-Encoding");

// shhhhh...
header("Server:nginx/1.2.6 (Ubuntu)");

/*
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
ob_start();
require('./wp-blog-header.php');
$content = ob_get_clean();

$acl = [
  '10.109.137.253',
  '10.51.145.210',
  '10.70.135.81'
];


// remove all content between body if special param has been passed
if (in_array($_SERVER['HTTP_X_FORWARDED_FOR'], $acl)) {
	// match content in save
	preg_match('#<!--\s*?save.+?<!--\s*?end.+?>#is', $content, $match);
  
  $saved   = preg_replace( '/<!--(.|\s)*?-->/' , '' , $match[0]);
	$content = preg_replace(
		'#<body.+?</body>#is', 
    "<body style='visibility:hidden'>$saved</body>", $content
	);
}

// output to stdout
echo $content;