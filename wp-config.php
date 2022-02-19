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
define( 'AUTH_KEY',         'EXW@;l{RH8f5INq/[BxRgE+NFv>NiwIr$9.b.AVk{4!|MpW|_F~jpiEZ)A(9evmp' );
define( 'SECURE_AUTH_KEY',  'dOK]<V>6fM_RyJWWEfHp3gF_4HZ9.8Px/3d%u$1x|M8YO:={qIWOKGRtb/u3mV9(' );
define( 'LOGGED_IN_KEY',    'ZT`]h/EtO]|E7#r<N][Mi3u#(hM:t+`D-sL7?ho9uH9)t!Vn?te&=gGL.3|zd$4q' );
define( 'NONCE_KEY',        'Zbe@wC9}r)-9iyM[8Lac%k,]^#?Bbs5.D;nZ~4(S-q&w8to9%CkwhHCHEge12<S]' );
define( 'AUTH_SALT',        'MLqAXoJMXErkCRo~8Z_pm3>Y_WAlyEgw%Y0gyw<<il!4Y81W`mHMFc,%csKKl<1G' );
define( 'SECURE_AUTH_SALT', '3Z[w(2jzf[l0/%AhSP(}QN|oqW<e0]yqFFM`o}4Qh;7AxKc0nQ?]6pKf;7@7)<Q)' );
define( 'LOGGED_IN_SALT',   'Kp1Ve%C4>a9z@MP.?,>}I/m6M%h2Q>=dRkz]|}L9_j!a6R]q{Sv8w/}gO4Z3fR}Y' );
define( 'NONCE_SALT',       'b]4mfAs~R,e_0cCShOByDfr@c#-,e]2qCRvx@@@]rYOI)2lT%m#`}A>?;2<A]}I:' );

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
