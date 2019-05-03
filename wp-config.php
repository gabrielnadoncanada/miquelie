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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',          '4^$-lXlBU=I>+[PY0_w@xGFih.|a`1me&B y?_XJb0n%N_{Ql(1DY_Dj2[fht&@L' );
define( 'SECURE_AUTH_KEY',   'u#rJF!ecq@DJognZ*D612dJ<{gf8;Pc.BCA=1BYtq<w;2+avki3.YM3pvo[l`$AR' );
define( 'LOGGED_IN_KEY',     '81ET,^fOw*e!oGH9qN{x_@6piOB&4]C0o>PgfASgXFsH11(chK^Scs(w0#cYeyZp' );
define( 'NONCE_KEY',         'kP!Zy(;O(oea= ;TTSZ0 4q++&16KUkYo|9E;Hjb&b/4gWLEZ?E/Y)xU,rKx(~{,' );
define( 'AUTH_SALT',         'P>bh>c{,jC!PH&fs]g+M^si6iF5h:~Li8eo}4_NO*^#o<^p1iY;uEV<Sh,%z/2xu' );
define( 'SECURE_AUTH_SALT',  'MAT:+PX v8+k_R@(7h9^vw*$ah-.,!&<~DZT<MJlo5FoKGYweyV5=OBymC8D(cAU' );
define( 'LOGGED_IN_SALT',    'Ml &fj~VPSYPRc23^xu|R9My^WU%OW*Zt$kp$(*j;V0@?,}~i;_KG1f5Y;D3<<)l' );
define( 'NONCE_SALT',        ']?dNex5?1c1!x;|V5wFgR$1W{r-IJm#B`!QW8H75]oK:V2Vk{OHfWt7]dOK|=m:1' );
define( 'WP_CACHE_KEY_SALT', '7{wxb2Q?Zn`@qQi]Js!S#{F!NjSlBF}-)`$zY5?xs+Td!Dukuf20jn~bUre[QwxU' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD','direct');
