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
require('./wp-blog-header.php');
