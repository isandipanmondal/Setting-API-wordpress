<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'regis');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';2Sl%[5w)AVK.!(rM-!(LM|V.u{wQ-gxy))#$,hfVc}ZDWD ZV8:L8V-)9%,fNNk');
define('SECURE_AUTH_KEY',  ';7A7Q)NT~nXpc`|Zh9zWyz4t70u2mzb[T}sgF@}#hq/F:hnb)[a!`=;|G/Wu)}Fz');
define('LOGGED_IN_KEY',    '=YxxkbXS=;9It,%%Z|[]<]gn~O<t9Cs l}<<y=f&I~(Iz3OCi2jhP;jCT=Y (msD');
define('NONCE_KEY',        'M=Wo4*iy`r)j^?;Qiw+]29yHzo/VveJRt+.Pl6_jU;>M+[;hMVKmKk2{7$v7VO-1');
define('AUTH_SALT',        'x6<^vWZXlqD/,?QCRolvL5FE|#EKA/C`cLS@mgW7p>]bCPPjQuG@|aFHByfpN#8/');
define('SECURE_AUTH_SALT', 'l22!~v}2zuj=9gd*[r@-H|IB}oXXCc_5*gbS_Xg9eIlo^RFOg_OboNZT3m#PSHH&');
define('LOGGED_IN_SALT',   'mDcgBsL`_<T]-e)Ax)~@QrQtf}v$oH6}Smf0Z]*{5eA,FF>$Au/Jvm*i9FEhEyw9');
define('NONCE_SALT',       'LJg,zx;!^L+t}zB^5asZ1Ox5-PtNs)n?]4BR)^L6[ADfl_Ni]NfNBT@[UPC845)&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
