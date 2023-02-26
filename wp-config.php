<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wl-test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'wj;X$oJMXgukj7V!Xtg>N.!oC+wg O[!>t8O%wG^]Iql!YHz^9m0!mpUdh*W[@$0' );
define( 'SECURE_AUTH_KEY',  'q~dtA;.&(,SH$tD;.c-*S;uCKO?T+*#)|=4Dgr>@V3uhBNhBIo/Ba6Y9BQG!;9d.' );
define( 'LOGGED_IN_KEY',    '-{n2)PSl49wp_Ol9oju>fZs.u]SFw@n}3)X9pX@8C-WQq-`i8|/!S(^vn4h(#pH6' );
define( 'NONCE_KEY',        'wJH@>5q6xmu|A*wZ>!Y]x*VV#D!p|Hbn2~z5uC`9FY,g{>%4xp:[G.s`0W!-ls^E' );
define( 'AUTH_SALT',        '5hei5_#bbHh>rhcx!^ CV#,.T&}gE!y#[mgLZb-w` O!h@GX=/a5X^mErQm7?bwh' );
define( 'SECURE_AUTH_SALT', 'Dd;Vj!e)<U=9ML[x0PKpqkO*c,*U -#-(ODi:e:Una,oGIUr}Og63%!b~>z%VEg-' );
define( 'LOGGED_IN_SALT',   '`w>6hzyZ2g3B8/dW<J>`.b2d2GnuQZaT3=_^pP:[sf~ 2@C~F*St?1tyh^SY!D1{' );
define( 'NONCE_SALT',       'zQuvu?!VR3kEsq+1LdH85GAUN8~o58TstE[>/>@V7cqgU0*},E#?pm6Im|Th]eEP' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
