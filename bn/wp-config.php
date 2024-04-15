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
define('DB_NAME', 'ph19284029361_nnnn');

/** MySQL database username */
define('DB_USER', 'ph19284029361_n');

/** MySQL database password */
define('DB_PASSWORD', 'ph19284029361_nnnn');

/** MySQL hostname */
define('DB_HOST', '198.71.227.84:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define( 'UPLOADS', 'wp-content/uploads' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'x,Y)SWlBOYOC;Xyry:j>{$Gk-;a&}i]tiL!hH[s#]sCX]myidRL+tQ&d(imh/DVG');
define('SECURE_AUTH_KEY',  'O}qSoxPDutA]d$JuUE}LNaszoR[-(qS`sT9+kgZhmc;J=HjLj/&?%jF[.F#>%hrL');
define('LOGGED_IN_KEY',    'n[hOMl-Y3ca3`+?$PU6-Hkd;.4jtqZK-mp|YIvZx``~grgdu9A?4W-qxL78+G/ I');
define('NONCE_KEY',        'Rb*ECD6^B[Y`irGo4@7!>aKW[**6Hz*s=w&e{10jSD+I5}u[]p;>}}*S/j-KjJ!)');
define('AUTH_SALT',        'gjf{$I[d> ^@$Nzn8g{|D9vgEX[#t 8: k6^}WJ&Vgy3]PbnG7ir/i)5 AQ5I`)v');
define('SECURE_AUTH_SALT', 't[9^R^lt0C]2Rp{#]b>zgg-+6T8}}X3]4;PcOvloso>h;mt -#~IY_sE`jfxb5`<');
define('LOGGED_IN_SALT',   'PS1XZjbmY=FJ`?.ALEwZ_%b<geM.b@,3rb+lO]m1Yjx.5FEHyOzDg8>]NhN[Dtq3');
define('NONCE_SALT',       '=zfK6f:*pOJPM$YP<Yh2.7;l0bA.@bzFPqa{7+bMSF/zLJ)P@t99QcIIwU%0*^a,');

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
