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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jsobieze_6a7' );

/** MySQL database username */
define( 'DB_USER', 'jsobieze_6a7' );

/** MySQL database password */
define( 'DB_PASSWORD', '5AFCB2DE3wz8g4us7av1h0o6' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_,LyEyw6,`=WLOP[:xV*cPOG$fVu;/EvUl|ac3wW?Yu7jYU[{cJ>K`p&Lf=DpA%G');
define('SECURE_AUTH_KEY',  'sY]axFHk>)dTJPlQd6e/iIo_?z-6_-!{L7QQNT+b6CpA|.DjE7k-&a<Sg(B=XiY&');
define('LOGGED_IN_KEY',    'wV}qAH07W7u&K~GWk/.~BWHV]-MRqfhrC_H%a8=R~r:#SsHfCvC:`A.c$ d-d+A`');
define('NONCE_KEY',        'R?j]jw`EaS1Tgv333wlF<wMs#r/y)MmI-@|%C:@>V4G(RNlUaOuwsL7S9N SgE@j');
define('AUTH_SALT',        '+ptD,UUY-xgawuQ-,R+E*n1Z#H[U YUZ<EYA{lLk581<|=4Z[/tdnmCRziiJj~x$');
define('SECURE_AUTH_SALT', '>Mz>`4DEGOu;aAx{#6~;cF7y+urR84~]|0o;<$nfFD-#gN-6bHQaX1KWz+M|o@ct');
define('LOGGED_IN_SALT',   '/3{|CVv^ln0JlLEwmTfNDp K||5YosDY*uzT^ec1l|TfZ)tki+b/,_NK(,zj*GQ]');
define('NONCE_SALT',       'O|1&{-3GjB[YH_QrEmc+K}j]|=z?Z!~Rh`[&Axh 1+*EAeU)1,!xa?ydLsT_lz;]');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '6a7_';



define( 'AUTOSAVE_INTERVAL',    300  );
define( 'WP_POST_REVISIONS',    5    );
define( 'EMPTY_TRASH_DAYS',     7    );
define( 'WP_AUTO_UPDATE_CORE',  true );
define( 'WP_CRON_LOCK_TIMEOUT', 120  );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
