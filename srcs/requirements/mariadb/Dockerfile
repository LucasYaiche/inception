# #Sets the base image for the new image as Alpine Linux version 3.14
# FROM    alpine:3.14

# #Updates the package list
# RUN		apk update

# #Installs MariaDB, MAraiDB client and vim packages
# RUN		apk add --no-cache --quiet --update mariadb mariadb-client vim

# #Creates directories for storing MariaDB data and runtime files
# RUN 	mkdir -p /var/lib/mysqld /run/mysqld

# COPY	./conf/create_db.sql /tmp/create_db.sql
# COPY	./script/entrypoint.sh ./
# COPY 	./conf/mariadb-server.cnf /etc/my.cnf.d/

# #Installs the MariaDB system tables and creates the initial database.
# RUN		mariadb-install-db --datadir=/var/lib/mysql --auth-root-authentication-method=normal

# #Makes the entrypoint script executable
# RUN 	chmod +x ./entrypoint.sh

# #Changes the ownership of the MariaDBN data directory to "mysql" user
# RUN		chown -R mysql:mysql /var/lib/mysql

# #Changes the ownership of the MariaDBN runtime directory to "mysql" user
# RUN 	chown -R mysql:mysql /run/mysqld

# #Specifies that the script should be executed when the container is started
# ENTRYPOINT [ "sh", "entrypoint.sh" ]

FROM	alpine:3.14

# Update packet manager
RUN		apk update

# Install mariadb and mariadb-client
RUN		apk add --no-cache --quiet --update mariadb mariadb-client vim

# Create directory for the daemon
RUN 	mkdir -p /var/lib/mysqld /run/mysqld

# Copy and execute database creaton script
COPY	./conf/create_db.sql /tmp/create_db.sql

# Copy entrypoint script and add execution rights
COPY	./script/entrypoint.sh ./
RUN 	chmod +x ./entrypoint.sh

# Copy mariadb conf file
COPY 	./conf/mariadb-server.cnf /etc/my.cnf.d/

# Install database et authetificate
# Set to socket by default root authen
RUN		mariadb-install-db --datadir=/var/lib/mysql \
			--auth-root-authentication-method=normal

# Change ownership for mysql files
RUN		chown -R mysql:mysql /var/lib/mysql 
RUN 	chown -R mysql:mysql /run/mysqld

# Execute script with entrypoint to make sure it's never ignored
ENTRYPOINT [ "sh", "entrypoint.sh" ]