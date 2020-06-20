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
define( 'DB_NAME', 'coffeewordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'newpass' );

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
define( 'AUTH_KEY',         'Hut>L}8{dpXm,`M_P}yr)FB$rvEQ~/+_wYJCeP$vv{g{g[yF_>F)b<Y&2h9eJQs@' );
define( 'SECURE_AUTH_KEY',  '4P+a&,BjP*#>&-P5Lt7;8DBo3ut{D0$7HSX+Cz(<pHs.4Qzz&OLTIqU*4med:-Aa' );
define( 'LOGGED_IN_KEY',    '+-v=r] ?<KafJm)8eEx+yGs ?w609b7IT(W.z5{n3/LR63NjbD5Llxxa fQ.%leC' );
define( 'NONCE_KEY',        'EhORLVxqK@:Gibl[@^ok@/rm}H <LP@@%OU59W3EG:{90/v@u,`Fhf^z*V,~J5$M' );
define( 'AUTH_SALT',        'Us`+2E]*R;QqF5:JlL/nWl9{c&HCl{jaU3ojb4CyJ0#zj3zXXjq,hAl*qBO (}K,' );
define( 'SECURE_AUTH_SALT', '?s%R}cJvEzEuXC$@6*7d[=os1n),{P7Pc{1@^#mfc(b0N% DfHV5wuto.6eQCNaT' );
define( 'LOGGED_IN_SALT',   '8Z@,&+:cQnj$6kSoQx}6WooD#6;,0[aSjZY`tTH1qz/(wd)C`*upikthIo<z8`=]' );
define( 'NONCE_SALT',       '`4E6l[v87%lEe}mY.j$mg`vO:zejxPx>N?!Sn0!Mn*<mpv4wTI$4qEc/[?+&t:zT' );

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
