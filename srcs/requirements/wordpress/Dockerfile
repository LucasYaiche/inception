#Sets the base image for the new image as Alpine Linux version 3.14
FROM	alpine:3.14

#Updates the package list
RUN		apk update

#Installs different packages (curl, bash, vim)
RUN		apk add --no-cache --quiet --update curl bash vim

#Installs the "mariadb-client" package wich is used to interact with MySQL/MariaDB databases
RUN		apk add --no-cache --quiet --update mariadb-client

#Installs various PHP packages and depencies that are required to run WordPress
RUN		apk add --no-cache --quiet --update php7 \
        php-phar php-json php-curl php-fpm php-mysqli php-iconv

#Create the root directory for the WordPress application
RUN		mkdir -p /var/www/wordpress 

#Download and installs WP-CLI(WordPRess Command Line Interface)
RUN		curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
			--output /usr/bin/wp 

#Makes the "wp" file executable
RUN		chmod +x ./usr/bin/wp 

#Downloads the lastest version of WordPress and saves it to the specified directory
RUN		wp core download --path=/var/www/wordpress

#Sets the working directory
WORKDIR /var/www/wordpress

COPY	conf/wp-config.php /conf/wp-config
COPY	./script/entrypoint.sh /tmp/entrypoint.sh

#Makes the entrypoint script executable
RUN		chmod +x /tmp/entrypoint.sh

#Specifies that the script should be executed when the container is started
ENTRYPOINT ["sh", "/tmp/entrypoint.sh"]