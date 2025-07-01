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
define( 'DB_NAME', "tiudorg_trdb" );

/** MySQL database username */
define( 'DB_USER', "tiudorg_trdb_4z5" );

/** MySQL database password */
define( 'DB_PASSWORD', "2D6fl9@v5" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         'foyxbey63yztgk9zqp2p2iu4m11rnasusfabf6btqikzeutg6pyczfzhorelifdb' );
define( 'SECURE_AUTH_KEY',  'fpnxkcil0v7ut09oigr1czol9tefzvblhg4uzgkbwksik8tpizghzgq9ulgtchu0' );
define( 'LOGGED_IN_KEY',    'smwstcv0qee4fidhw3zqrbfs41qd9n6xw52hfddwglogcgznjpr3advd3wtgjvqn' );
define( 'NONCE_KEY',        'cwtaj2cl93xajjo3y1lglj1dvxm3acjrcqjc8lkfj7zecy5znruu6psjz0bzkeki' );
define( 'AUTH_SALT',        'utlqkn1hh2rcxjnpmjipak9rwffauezregimfszraxwzgivp1kyhircpsaherrlf' );
define( 'SECURE_AUTH_SALT', 'upbtt1xeplcayqaz0c5vcsotnfesmfgu0xklmcbhlkspvepdafy8zxuyfmbp6idw' );
define( 'LOGGED_IN_SALT',   'zzh5ix1lwohhvnyxy4uanzkevqrrwyp3fjatggpbqjrinrj5ybgnkyprub4rmls1' );
define( 'NONCE_SALT',       'wgj9avqsmwpdufqszcgikbs7vri3xbf8aqvpxuayg2brospfchcfjy4yel0ribe4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wprx_';

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



define( 'DUPLICATOR_AUTH_KEY', '2xsfCszD)%tn T~`8Ng0C{l:;NCOJZmd|R]:TzhQ-p1lB+m2xjG*H&k=zEg{HXUS' );
define( 'WP_PLUGIN_DIR', '/var/www/vhosts/tiud.org.tr/httpdocs/wp-content/plugins' );
define( 'WPMU_PLUGIN_DIR', '/var/www/vhosts/tiud.org.tr/httpdocs/wp-content/mu-plugins' );
define( 'WP_CACHE_KEY_SALT', 'tiud.org.tr:' );
define( 'WP_REDIS_PASSWORD', 'rG5Md9httzhzGuEd' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
