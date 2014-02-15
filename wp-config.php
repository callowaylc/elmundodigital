<?php
ob_start();
?>


<?php define('AUTH_KEY', '*U?<ZLqjHxLo~${AIg+rfJ|D3McHYj y@5a_:A,eR<QAHu+5@5IZDg4/b^YojyZW'); define('SECURE_AUTH_KEY', 'wy.cPy4uQUlM)v;fh@*jjb2Rd8Xv%p~*}:bg]i]V>.[:F+l`!4-|>7Xh>b@4A|FZ'); define('LOGGED_IN_KEY', 'sDWI|Wcvu}EvIEUG5=f7W)LJQ2Ros_ y/Es85z@9^9S+u>Pl1:^Hxq6ftO*K-~NJ'); define('NONCE_KEY', 'XuCl@22-36B[|f9sXqc^i+TJ&C!#`S{f9,<)pt<I$s`*`F|Qjt3xuNsHy.T|{eq '); define('AUTH_SALT', '^+R|DvFZq,xL]4dbi8zJJGoVKA#-ma9:n-|rxd#Nzcf+1_p6SS)qJ:C<WAGM-:rP'); define('SECURE_AUTH_SALT', 'jf}1P3kosp)@3-leVm8_>X)TRA>qN::W3&E.pi=JOmCC=@2=oSLLdN9juNcJ+:2V'); define('LOGGED_IN_SALT', 'ukh<|0XB<kP47<USQFZL/Z79K:pjc|;X%~DwS$RBpKBf@ww)8l|e9$]kjCM{(%hl'); define('NONCE_SALT', ':_nX KuQP]QzNpC;VOFyq|{(C.}MU#|g_2*)(`FX|LOvd`=:6a/U546V7HY@ t`h'); ?>

<?php

/**
 * The base configurations of the WordPress.

 *

 * This file has the following configurations: MySQL settings, Table Prefix,

 * Secret Keys, WordPress Language, and ABSPATH. You can find more information

 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing

 * wp-config.php} Codex page. You can get the MySQL settings from your web host.

 *

 * This file is used by the wp-config.php creation script during the

 * installation. You don't have to use the web site, you can just copy this file

 * to "wp-config.php" and fill in the values.

 *

 * @package WordPress

 */


require '/etc/wordpress/config-default.php';

// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

//define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'elmundod_wdps1');



/** MySQL database username */

//define('DB_USER', 'elmundod_wdps1');

define('DB_USER', 'elmundodigital');
//define('DB_USER', 'root');


/** MySQL database password */

//define('DB_PASSWORD', 'L8ztWZcdsS0J2p0Z');

define('DB_PASSWORD', 'fe5180zz');


/** MySQL hostname */

//define('DB_HOST', 'localhost');
define('DB_HOST', 'database');

//define('DB_HOST', 'ec2-54-24i2-53-234.compute-1.amazonaws.com');
//define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');



/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');



/**#@-*/



/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each a unique

 * prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';



/**

 * WordPress Localized Language, defaults to English.

 *

 * Change this to localize WordPress. A corresponding MO file for the chosen

 * language must be installed to wp-content/languages. For example, install

 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German

 * language support.

 */

define('WPLANG', '');



/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 */

define('WP_DEBUG', false);



/* That's all, stop editing! Happy blogging. */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');


define('WP_ALLOW_REPAIR', true);
//define('WP_HOME',    'http://ec2-54-242-53-234.compute-1.amazonaws.com');
//define('WP_SITEURL', 'http://ec2-54-242-53-234.compute-1.amazonaws.com');

define('WP_HOME',   'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL','http://' . $_SERVER['HTTP_HOST']);

//define('WP_HOME',   'http://ec2-54-226-105-189.compute-1.amazonaws.com');
//define('WP_SITEURL','http://ec2-54-226-105-189.compute-1.amazonaws.com');

//define('WP_HOME',    'http://ec2-54-234-213-29.compute-1.amazonaws.com');
//define('WP_SITEURL', 'http://ec2-54-234-213-29.compute-1.amazonaws.com/');
 
?>
