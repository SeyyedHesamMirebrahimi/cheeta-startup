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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', "symfony" );


/** MySQL database username */

define( 'DB_USER', "dbuser" );


/** MySQL database password */

define( 'DB_PASSWORD', "hesaam@1391" );


/** MySQL hostname */

define( 'DB_HOST', "db" );


/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'GPdK<+]{IFsK/`Wk$_d D/@fGw,)^t*DO(bZYkp)yWU5^8.iePD`GO*d~_ouQvmU');

define('SECURE_AUTH_KEY',  'al4S`h}Wnl{Z~E%pa6 :$.b=AQ!Y?EGvJcU98Y9-sDU`@=+X!FHqyR;7A5a1;- !');

define('LOGGED_IN_KEY',    '5KHx]_c;vp{-KTk95|=-Vh280lYEz!V%]Nt>jv5^^TI$aO?R~_6x%St`T+fx&%PA');

define('NONCE_KEY',        '^p8h<#dZP78F$rxDw4C7A?F`l2Ey;P_xNn+ky_w^^E<z`;i2DHK0 B8Kah_}ZuuE');

define('AUTH_SALT',        'ak5=EM;@,.$lkiCdE:([|>9od$BE9]!@;uqi>U6fn><azeMFNaW,4|g.&N0)nEq4');

define('SECURE_AUTH_SALT', '-q,p`KsQ31C!2.ayM>|M@_:}[TaZ^m*q.n8yVMuH}T5;1vDdB6S0),Bey?Lp7--|');

define('LOGGED_IN_SALT',   '7+sj52_jc8J]_jB0mi0{`KG5~Eyu,7>u}no0s`I<R/?#+8vlH~/+)siDe~Q5#5!*');

define('NONCE_SALT',       'N:Qy0f$RYre=}zF>%#(B%*|&L_mZb@U],:o|0<-mHG9f s<9o><uPjh{JY[rRB%p');

define('WP_SITEURL' , 'http://'.$_SERVER['HTTP_HOST']);
define('WP_HOME' , 'http://'.$_SERVER['HTTP_HOST']);

/**#@-*/


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';


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


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

