<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */
header("Cache-Control: must-revalidate, max-age=3600");
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

// remove all content between body if special param has been passed
if (isset($_REQUEST['xyz'])) {

	// match content in save
	preg_match('#<save.+?</save>#is', $content, $match);
	$content = preg_replace(
		'#<body.+?</body>#is', "<body>{$match[0]}</body>", $content
	);
}

echo $content;