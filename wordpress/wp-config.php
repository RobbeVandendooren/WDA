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
define('DB_NAME', 'WDAWP033');

/** MySQL database username */
define('DB_USER', 'WDAWP033');

/** MySQL database password */
define('DB_PASSWORD', '65387214');

/** MySQL hostname */
define('DB_HOST', 'dt5.ehb.be');

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
define('AUTH_KEY',         '&2vgsd)HcJ8%+w;N*;av?!r)+P=,jaH(T)K135Uv|+wI+lHv;4jAY,6[oZnhHB$M');
define('SECURE_AUTH_KEY',  'gNTt`^52pMGGdHz*A1-aDY6Q@l2~>EJ++Qx{*m>P`~O~5K~CKav.aQ*^%70D$Et`');
define('LOGGED_IN_KEY',    'Vmy6Jj+aSFI,aCgGj;|j!rwYZ^G@y.7P:O]eP3Bh&Xy%>UhlH$Nx*F0#&4+o$q`0');
define('NONCE_KEY',        'MyDfNm+c/=8o-mEs=&#_[WPPV+}1q+r5u^>5oG3<e>B=kk[.E_#cf|Cs-Uut|dGs');
define('AUTH_SALT',        '8pB_p:%39gY+z$=-+;[LMN8GIX+9||l:!aD=$$E+dq-(cTuw|h|Qj3x;t9aLKnfR');
define('SECURE_AUTH_SALT', 'C/H&1J-BqJlo]GeCUNEGUg;LI1JZ0wC8u&+fkV>]Gr7H;GknhxS/;T*2kMy6@7r`');
define('LOGGED_IN_SALT',   'UsTUS=XMZ1z&MhwDZ_n_r!WJ*`9E`_f=-w&3$jg2whebBUz,m4.lby,=>)*.79H$');
define('NONCE_SALT',       'Cp()1~|Ly  wY+cJvozn6V7<:#iVn|cm j|F-Cpflw<[)Qj8Y|As0k?x{~K mB]e');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
