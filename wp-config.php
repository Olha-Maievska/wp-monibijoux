<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'moniBijoux' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '|@_9XIvd#w@jh ALB>R-G9+Z9F:#EV@~/:K^g3xNv_p oSqzrfcm$ZE*. ,Lsu;7' );
define( 'SECURE_AUTH_KEY',  'dt)SbV;O*rbBW+<1ii5R2oI+1<41ZzZ<jY4&9M`:#-N7^DUL<t7eww>E_{eW>Vnm' );
define( 'LOGGED_IN_KEY',    'j{|nY95gV2Q{?mUX^>`/9[}.4cp<se]=WF3iD6{T;J`c$*|N)FJw@ Now}kYtm `' );
define( 'NONCE_KEY',        'U;+YdnEo0Sg|y]z <2*F[II[j;nv_ml QfVClw3P$TJ$oV|Ze{cThg?RVtKCy&lY' );
define( 'AUTH_SALT',        '*yu]dAYC<L|`=7<aC4-hl)(:+zvW)h$&C)Yk%8*yc%6,FEZXLGH[<<e$mQu/O2YB' );
define( 'SECURE_AUTH_SALT', '{m<+g$R!qO+[WXO63K!7t.gNnG<9d^#PvNbDc2oFDz(;v[xRb~W#DNQ9bj8QirB&' );
define( 'LOGGED_IN_SALT',   '}:l5mSWgA`.Cb>evTl)3.P1mWV>9&CV`2.+o,GEX*p/tIn&l-;:K30K6H=qHEXpR' );
define( 'NONCE_SALT',       'uB7h+`sWkBu*ERx)Qr;{APeH&7vh-;VA^ayJ;,XPqy+nQawe:V7&Csq_A}?VURVf' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
