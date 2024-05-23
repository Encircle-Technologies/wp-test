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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('PRODUCT_HUNT_API_KEY', 'UCRY63EzWPQUiX4c02507QWoLhFX9gXrd3gSZ3DIUWA');
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
define( 'AUTH_KEY',          ';AHdh%%krPJJe{M@:t|d7N$E 8bI.:l_23u,sLh?.{tL}TY^Lk:M{v/W!<!C}1;&' );
define( 'SECURE_AUTH_KEY',   '=P#moGgosMw+[>&|usZpg8u5~=Zz|XLr~7AdBDp>`u2h5}Dex4qdTV9@~EnNPia@' );
define( 'LOGGED_IN_KEY',     'vEyB]S46H3ixbT+xL!BAqRTj<yyK^g-|PZbDV>st1=Df6;-6n5<[iu6E7H2~SCXd' );
define( 'NONCE_KEY',         'W|ef?5u(h1Hg|<s[H,-9.R?:=n`d5i<8pJ.|U,cf*SfR9@*XRY|2o+|xvGrUXhi.' );
define( 'AUTH_SALT',         'zaTuX`R~_*b>KYqSZ:5x}]M0j13O#dE,>eO }4/%5u@SBgCf bUKtXv Tj`UKmI-' );
define( 'SECURE_AUTH_SALT',  'Ja4OjU$m<auX2lgi*Ev5el3Qv1NVX?i|t?z}&Vb<#Mf*.e3<6n[h3Xy/]HQJ(jb$' );
define( 'LOGGED_IN_SALT',    'x8Nhl(e[hkRwUUg#EUlK(DM5.fuN x<3eN(),VM@}*uZTA?pv)!$-lajC6Ag7Y}h' );
define( 'NONCE_SALT',        'FSr$H^yGa5Ay5lHTiZVd&SSL&|z^2cT.XMg0)xGvKag;&AKvl_x%gVZi,$_gVF=B' );
define( 'WP_CACHE_KEY_SALT', 'P7=ffQ.0eW1/y5n3 aASD$.,G @n*CK>>59-K}okZ(2E;E/ipP~vXSyFRVNIx?)D' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
