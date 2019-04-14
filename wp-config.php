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

define('DB_NAME', 'fortnight-37317093');


/** MySQL database username */

define('DB_USER', 'fortnight1');


/** MySQL database password */

define('DB_PASSWORD', "Fortnight81");


/** MySQL hostname */

define('DB_HOST', 'shareddb-g.hosting.stackcp.net');


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

define('AUTH_KEY',         '<LdHG>?k2<]Ecvf9;A0@v9=%Y^sc$IpTI7y4U$lo|A ,(J!4qQ02l#uQE$OHNZfR');

define('SECURE_AUTH_KEY',  'C16-@Nh#nu9xTabIXl[$RvqzXkp-Gc_(slDjM2%j+%3=|NayGb7l+ `0S:(:W$/<');

define('LOGGED_IN_KEY',    'Q`SO-,%lDeO+EC/TGATkjD-C+F)BWl-!GWJckA&3af-ec:BN*8VR]%Xj.`e!=O&b');

define('NONCE_KEY',        ')7NdP(76eLEH!%DU:n]1rP#W@w,`.dYy$CdE1H(_9hi(bIHUtt5@l=^`tLL/.8/k');

define('AUTH_SALT',        '|&)%D<ymKNK0iv3i-8Klk7c@`H#M#rpr*7wg<vB/.|%YE Td]sqWz<GL[zjFl&nX');

define('SECURE_AUTH_SALT', 'TaXKunbL~QChI}Qe2DNiUcO+rjTX.V0.BB$]CBJIb[Vs|c<)h8n X;9<P=W]d Xu');

define('LOGGED_IN_SALT',   'IJ+&w;#d+Lp2rF#/57V}X*EP{fE1%,i+c~J:;N3G}.wHVo`M,vfPQh&doknzq|[Y');

define('NONCE_SALT',       '9?oe ?K|bQcq/#.:0Vq?re*nn%(.K!`<S_1_Gs7ImYyr9a{O#,9NU,?J>U]E[P9n');


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

