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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'n/SL7X}VS31r{kp^!6U,bM^)V4gU^ePyU*IoF,j{E])GAr(Gl#!QYLb/arl0H;+#' );
define( 'SECURE_AUTH_KEY',   'V%!_lJv^E hIV)&~{x,^a>})6P-vXdxX1<5pBsM |}EX!$D$vi:HO4OCWQ 6kYbM' );
define( 'LOGGED_IN_KEY',     'g8kawH$bC=<*8v%IHVPh`qprlixV$iX+48>}:^ziB4;QLR[|WoD2)s<6Ntk9ewcH' );
define( 'NONCE_KEY',         '!.a{R{q-qZ38DiZ/,L8T:b?>sGx763mAIR0bf4OHe_QJC.b?3cH`ep&=x`g]*D,Z' );
define( 'AUTH_SALT',         'v%p(Np=AT.O#qid`HuuYPiE8zBlYgTkBb|6![ M4Z_fXVK4OUqh;5/D?thZXKOXG' );
define( 'SECURE_AUTH_SALT',  'FdD&2t@S Mr>Z]VK36%bM.Zo-@#Pge![zYi#z/7Kvy}DB>83S8*y,B`[DrFYLu8,' );
define( 'LOGGED_IN_SALT',    '=_~vY,Uj<=3-0>>lRx<`]hP5S6a0Te&0vLK<~ZaG|@p&EpFDJq8I&5`o$68q4:Ll' );
define( 'NONCE_SALT',        ',@X%&>[0X[!EflHKU!%vz:w(ei{(`NchF@XuazyD(eqa?-W9No3zzaHLeZ[>S4}!' );
define( 'WP_CACHE_KEY_SALT', '^G)QT{`QXe;;9;mZdkI9 v$88Y=%EB*DE/@P(0E!]${P<b[r4;^km0QNzTyYz0ue' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
