<?php

#Enables the use of a caching plugin
define('WP_CACHE', true);

#Defines the name for the database WordPress
define( 'DB_NAME', getenv('MARIADB_DB') );

#Defines the name for the user
define( 'DB_USER', getenv('MARIADB_USER') );

#Sets password
define( 'DB_PASSWORD', getenv('MARIADB_PWD') );

#Defines host
define( 'DB_HOST', getenv('MARIADB_HOST'));

#Specifies the character set that Wordpress should use.
define( 'DB_CHARSET', 'utf8' );

#Specifies the collation of the database tables
define( 'DB_COLLATE', '' );

#Sets all keys
define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));


$table_prefix = 'wp_';

#Disables debugging mode in WordPress
define( 'WP_DEBUG', false);

#Defines the absolute path of the WordPress installation directory
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

#Includes configuration file
require_once ABSPATH . 'wp-settings.php';

# REMPLACER PAR LE FICHIER PAR DEFAUT DE "INSTALLER WORDPRESS"