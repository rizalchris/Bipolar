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
define( 'DB_NAME', 'hirizald_wp_cem8k' );

/** Database username */
define( 'DB_USER', 'hirizald_wp_azgfu' );

/** Database password */
define( 'DB_PASSWORD', '#)X{3GopFBb$' );

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
define( 'AUTH_KEY',         'qkwp3GBonX29[/9>4BTfHYL{&G65y.Ut[i4i,Ch{]/7Q;x(1Z+`cFJ;Wy;(a}.E_' );
define( 'SECURE_AUTH_KEY',  '?q3+g!x!n :hdb<fA@~O{AgKo&L tD7RMy&aNzm<r/FB-rNlFV0^]HuonO8y[!};' );
define( 'LOGGED_IN_KEY',    '08A@gdvTkJZrAnB|5I]H<G-vL<2?a:pdh2Cflz%mT2=)),u&[0^%60yuSC~;Cl7D' );
define( 'NONCE_KEY',        '2bzY+=wNKCfShb17{|pXL=6;s5b|]k sVSFpu+wTJT^dOZw9h8IytRz{`9!q/K,+' );
define( 'AUTH_SALT',        '$VM$8mVf}.s,IF??Ax}#w] %%laueORIYgFw_Q5qzm@K9DAqq$xT`~1UL|^!I/L1' );
define( 'SECURE_AUTH_SALT', 'Q;e[^;HM3U6yDnw^baFK_x6n7Ny<wQ*qNq7}f *7306VbZP0%S5DCr]Kp~49N (8' );
define( 'LOGGED_IN_SALT',   ' ++pV_z7TOR.DE@yr<mfiUa{m[ K#6H+,-UeK!,dQ0x>LGP72~00j_vcP3!A(1rr' );
define( 'NONCE_SALT',       'uUu?!dbUf3p2X[.~ 3sg=4FHb6k1ZtId+mUd}QpA{wIoUwi{-+E9>ZHr|Y=4~y q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'X7mkEn_';

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
