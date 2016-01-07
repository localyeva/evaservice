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
define('DB_NAME', 'eva_service');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '!-.1kV;Lwh3~|:-E|[z6KU*Ge,/%j]j>zq32iHj`9_3idD>TrJHT.kGn]{|B]*Fo');
define('SECURE_AUTH_KEY',  'b+$?+5M/WLM++6<P/`MdhJ ,+qeQ!x5Js6R-JpkY9vS9(U*e!_3Y8)@exN5)yoO8');
define('LOGGED_IN_KEY',    '^:Pw?:-].:D0`JSb7AEI-m*{V_r}pBZLozMr-TOnQ@-W,^EPfx;?!rAIcw/DQyO(');
define('NONCE_KEY',        '/&WXZGHnGduf*b}D:n@4vnlyavaQDw}[=-``nJ^xKzBN95YS|W9N.Zo9Q#|h83E2');
define('AUTH_SALT',        'K=j2>w7G7Rk9]Yli83Dz#Alcjg`N0PHbm{^XYlo/Xh/]~W^;!>+P`DK/P,{~t!_9');
define('SECURE_AUTH_SALT', ' pX}a8l+|4&a<>!5xD2-.g2BxjI$+{y}E%?/|b||p)BPKv2gqU0%:_ka}-U1Z{h_');
define('LOGGED_IN_SALT',   'tR>1Pu)c_0ss50P)dB)Hn^?)**/`rU&*Dy.Qnk<9C?t(g{hpm}2,I]7C(A&Wd4Xq');
define('NONCE_SALT',       '`^F+JVJ}KuJ[MZHY%`&-AIbu6LDBB-s+>qz%Jvy2fiH|R=wv,vm|TK<C-k}^!/Yj');

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

