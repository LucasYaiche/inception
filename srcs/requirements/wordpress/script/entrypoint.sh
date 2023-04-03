target="/etc/php7/php-fpm.d/www.conf"

#Checks if the IP address is correctly configured
grep -E "listen = 127.0.0.1" $target > /dev/null 2>&1
if [ $? -eq 0 ]; then

	sed -i "s|.*listen = 127.0.0.1.*|listen = 9000|g" $target
	echo "env[MARIADB_HOST] = \$MARIADB_HOST" >> $target
	echo "env[MARIADB_USER] = \$MARIADB_USER" >> $target
	echo "env[MARIADB_PWD] = \$MARIADB_PWD" >> $target
	echo "env[MARIADB_DB] = \$MARIADB_DB" >> $target
fi

#Checks if the file exists
if [ ! -f "wp-config.php" ]; then
	cp /conf/wp-config ./wp-config.php
	
	sleep 5 

    #Installs and configures WordPress 
	wp core install --url="$WP_URL" --title="$WP_TITLE" --admin_user="$WP_ADMIN_USER" --admin_password="$WP_ADMIN_PWD" --admin_email="$WP_ADMIN_EMAIL" --skip-email

    #Updates all installed plugins
	wp plugin update --all

    #Creates new user
	wp user create $WP_USER $WP_USER_EMAIL --role=editor --user_pass=$WP_USER_PWD
fi

#Starts the PHP-FPM process in non-daemonizing (=execute in foreground) mode
php-fpm7 --nodaemonize