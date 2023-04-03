<?php
/* wp-config.php is one of the core WordPress files. 
It contains information about the database, including the name, host (typically localhost), username, and password. 
This information allows WordPress to communicate with the database to store and retrieve data (e.g. Posts, Users, Settings, etc). 
The file is also used to define advanced options for WordPress.*/

# Wordpress configuration file
define('WP_CACHE', true);

/** The name of the database for WordPress */
define( 'DB_NAME', getenv('MARIADB_DB') );

/** MySQL database username */
define( 'DB_USER', getenv('MARIADB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('MARIADB_PWD') );

/** MySQL hostname */
define( 'DB_HOST', getenv('MARIADB_HOST'));

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/* Salt, key, securite */
/* Authentication Unique Keys and Salts 
Change these to different unique phrases!
You can generate these using the https://api.wordpress.org/secret-key/1.1/salt/ generator */
define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));

# Prefix for the database tables
$table_prefix = 'wp_';

# Allows debug functions
define( 'WP_DEBUG', false);

/** Absolute path to the WordPress directory. */
# Allows display of index.php
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

