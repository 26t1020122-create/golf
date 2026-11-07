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
define( 'DB_NAME', 'fairways_db' );

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
define( 'AUTH_KEY',         '9[6}N>5q>$b}Y~h|;n_:cH?&-%nugejvE?v7x6#c<j+}:j,}2IiZh:-SI$Z5u&#R' );
define( 'SECURE_AUTH_KEY',  '~o,L`?dm,+{q~tD.Lf{e[.!o2fw>RG:&DhpEFKWJ,V8HF^bL^%<J-{;]wtIEV_M>' );
define( 'LOGGED_IN_KEY',    'eV%5Buf]2( `<HPrbSK<^o^WN{ol8F(.H+d:S?bx;]ET:YNiQdga+`:Rd6.,.[NM' );
define( 'NONCE_KEY',        '?q_0mq9`4i~wvwu0xbiOTZ5b[n2~b0s@ ]>&yzm6#8ep4-V0R{Ke&`Wf(Kj[|k=I' );
define( 'AUTH_SALT',        'YR@hWgbKIu7^4ip{@|Ki5q$T~v6Ic;JzrcbLv9z4]!(h-Y_iH6m/MS|xuF<Jy}.y' );
define( 'SECURE_AUTH_SALT', '+s ,)V .({!64+_HDg}1kAlZ[)&J~}VpfbZ0ZRsgJ[aq6z/M#(UKpOPFMT=erQ:(' );
define( 'LOGGED_IN_SALT',   '+gwO#6DLot_OR;glA#OZLY&Ium$/cj8I#>tntsB:u+Uu1[65>?Tr)MDi9~m_Iz2u' );
define( 'NONCE_SALT',       'WZEP~>z0-w5FRXh9ykOIHsonQX]tGC6%weZ2KKr]m;Lb^E1l.|V<Q{%Xt6eo87_J' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
