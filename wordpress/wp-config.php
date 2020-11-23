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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         '`Ce>[{yIqMV7:FVzEFH=i#$zD<n{l#JqyeGg @)u@4FDX6~WU+PJg$kGBfS.uq;I' );
define( 'SECURE_AUTH_KEY',  'w0ylv(QK?o=R1PMCR~9?=s#feg+9.#]h>Ai^hdy5S[i=CH$3ENHN =Qa-<Eq%]vO' );
define( 'LOGGED_IN_KEY',    'QDnWJ>+R/=E;)2(1x]~;LYj6 u[cmTZiNVKo]<(Z6;c*.<WVw%[Z&KAO`t4n=a,q' );
define( 'NONCE_KEY',        '6C[o V*pN$1~NkBf)2@}E{ bZNgMK{q;p1}I32^WnKy6&Ci27KI!?(=aKWtoee&S' );
define( 'AUTH_SALT',        'M@9Hs6^zh]d;_>--N.(=kl1YKq R1Yk|H1)yVH3pw]~ilc>%Yka6WB~?o74OftYh' );
define( 'SECURE_AUTH_SALT', 'fDK>MG9!C2VJhi,^((SRGv_$hN&NK=<PplUdL}Po#T)lz/>4@8TOa@^zrtRZ:/r7' );
define( 'LOGGED_IN_SALT',   '&. :7rZ,t^oz[4Gjb<=CgZ8^5fd]-_i7T<&d2p6F^~o*Z5meu(bMU<5dG}99$9N2' );
define( 'NONCE_SALT',       'Pd]UYr0.H=ditH(:}txE6+mUU1([,OY/=K9kTvo8eqe}K7Os(/(a12y25mdQ^Q-V' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
