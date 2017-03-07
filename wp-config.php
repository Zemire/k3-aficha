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
define('DB_NAME', 'aficha');

/** MySQL database username */
define('DB_USER', 'aficha');

/** MySQL database password */
define('DB_PASSWORD', 'DjWkzk1vocG4HDUJ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '*X,cpPh$E]`5d7vM+8l^)0&h%h!WLGB fc%B/ 2(TL9wG^x#>a#2hntdHe&QEfrc');
define('SECURE_AUTH_KEY',  'G2#VgV:G<D*HWqS8<uZ9PTe4u[9PrSs:W=%ndU%oF5_Ah4Ud7kE;Yd^yB1P+7%nl');
define('LOGGED_IN_KEY',    'Z_ZvY@ncD@t#H-Lweq*L6^HkQq[/4FiAM&5RK0QE~z_9REJL+M`~Bt/VH%|%;#RV');
define('NONCE_KEY',        '8N7LV8P[g+Y5)J&IzGw;RGV6LY1j|QkF^5<5- d.wUz4UJ%ck6+9N#`n|9BoY-Kt');
define('AUTH_SALT',        'DH@KSyNP~|keY?+&Sp;RE!G_H^aBS^<Jm@4)< 3X?xZjFKCg`.<i*=?n[2zOHH=7');
define('SECURE_AUTH_SALT', '%6NPy2i76vsXl>BOSGvu9wa-B$+<b8b^a}4+p`C2q2EgyXQQi<{mj_dd(.2VzYkG');
define('LOGGED_IN_SALT',   '!GCAsXGuMSbAJRD9oqy1n0s8K,`4q({$G,=r)gdO4xiwO;v%0_iQPV`QRd&3$}#3');
define('NONCE_SALT',       'qvm?nf~?6]euh>]ZVryco_8FHsJWn%z<]=TU-Fh2O7HOFZE),J?S_Mmm W<&`3qa');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
