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
define( 'DB_NAME', 'faroolle' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3z|#XT!V1rH}TMyUY,7%B)!*btpEki*6fIrEsL%|t=oO!/|d_33n9D9%bbwB@^OE' );
define( 'SECURE_AUTH_KEY',  '-yz@/g/?zSzSxq%5LM.r2SgAmP Ei]~.j@9;k-VT|n3XJp ]{!Q~-?Dy BgrVr_h' );
define( 'LOGGED_IN_KEY',    '3y<TR)gW_-c;$~X/ZBf6Q}A/y,AbGk4*w3dL57.]r+2w|=).u^Em u~}dhn{T5zE' );
define( 'NONCE_KEY',        '|t#zPi.?N]vaHv:n$T~%{=2 Hd(k+1bb-1!v96#lmk~$C1O+cUaR=`VRz,;a2c;7' );
define( 'AUTH_SALT',        '/nsX@ml*AZz}2[$_{m8nU8AKKhye)VW6AK;~. K4{:K{B(r+5btI=}87!Td2]bU;' );
define( 'SECURE_AUTH_SALT', 'Xo{DNpd+1l)YGwOL{T:BR()#{zOk@kN9W*PYh@_^Z^cc[+MH*FAP.B+!(5@0+X/b' );
define( 'LOGGED_IN_SALT',   'f5xbiK*{13+_Ju)N>_bEKY$/k=b_I<o[.>}WRBwQoX#0&vc?HS{Ffh3;0i;Dv>!>' );
define( 'NONCE_SALT',       '*deDr^0XsK|qi3kDS<d^/gZ%fy~{1i6~p}Ajwp iA:VB)Y~IvTl*mj=~]P?} R/D' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
