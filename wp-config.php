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
define('DB_NAME', 'studiok');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'eM,`c(z+;_)4opXpG$ni?y=gyTD-j5v;d|6IH@<l@Ye@|}N[+uz,lQo8Kq:)}LNA');
define('SECURE_AUTH_KEY',  '1{xwT2eZa<Un!Kb@oeSs[1TC/OUN*<JvgAjs&Br/*$ <_|>9-T;3I}shT@n PSLh');
define('LOGGED_IN_KEY',    '_A#!/2w^?yZl__.mU}x/ Zy+6+Q0rPF{aG3wBsm1-Uz9BzP8$T}G4Hx)9]ReEsO=');
define('NONCE_KEY',        'I]JR~#z~E-hZiNm.Z&z~ )7l<;A>%A`4R70Gz4oddB:zTz`1#P/KB8u,: D<&m4)');
define('AUTH_SALT',        '>p9:#YG22ad=R&:c-.`4weu0,]Th!7tE6d2fk+t Zy(l3C~74YBmDM+c@/@2Xtwf');
define('SECURE_AUTH_SALT', '1wR`6+A3Cw7voiL`gAe@Nu;,I!n*I{VuXbMVePxo3+4aj;jor/jl1P4 M#nfHWYV');
define('LOGGED_IN_SALT',   'sECmYX`@[h_?T&JKR#RdZ_;W[YUy6o)h:yT{O3MC!;_0;2eQFry-$&,zmnHB1Jqw');
define('NONCE_SALT',       ',wZ=D<X`;hThrpBw:_[^5+N~u[tCAT73.GBM;G}o#NsZ!9TQMuB`?{Y`KnT=x?YN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sk_';

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
