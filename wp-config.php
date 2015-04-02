<?php
//The entry below were created by iThemes Security to disable the file editor
define( 'DISALLOW_FILE_EDIT', true );

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stacymar_tpd');

/** MySQL database username */
define('DB_USER', 'stacymar_tpd');

/** MySQL database password */
define('DB_PASSWORD', '9.0P0R]S59');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '83pb6o8rxolopff0gpxux4fe7vm15whvupv9hdxpclncswefoq0dvd5sak33fs7b');
define('SECURE_AUTH_KEY',  'dsvzcbtk670oykzkesup2byfffd2hrmxweqkd0qx71gqpnt1drgve2naepqgrsig');
define('LOGGED_IN_KEY',    'o6oaafotr3q0yhmdg5kuvqyzbxikgzqodv9yssso2sgyd3bggyvesv5bgwfjfa3x');
define('NONCE_KEY',        'p1c1hkehaqtz317ncefjmcoyukajwpyfho4zbig92uvnb3kzldbsjnqfy3uveulx');
define('AUTH_SALT',        'ngfemqu90pyvhpyudts734xrhypnlmigb6wy4mwyngmj5oquyktk2leipz3mogjn');
define('SECURE_AUTH_SALT', 'p8hrxzlzgcbnkft5zh5rp6hdurld3nvqhck8wanvjw5y5owitwsqe4zlstdb9cjb');
define('LOGGED_IN_SALT',   '1ucehnle6hbqwkuet71eergv7ivbrfwwjv5gkctgb607hy6tawxrezy95holcomp');
define('NONCE_SALT',       'hixxxnkocdyu9bhpm49gp2ber3d9mariwlikvhg0llre0vgjcqf1mjktvqqamtwz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tpd_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define( 'WP_AUTO_UPDATE_CORE', false );
