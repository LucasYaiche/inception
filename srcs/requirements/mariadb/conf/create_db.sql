/* Cleans up to avoid conflicts with old variables */
DELETE FROM	mysql.user WHERE User='';
DELETE FROM mysql.db WHERE Db='test';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');

SET PASSWORD FOR 'root'@'localhost' = PASSWORD('$MARIADB_ROOT_PWD');

CREATE DATABASE $MARIADB_DB;
CREATE USER '$MARIADB_USER'@'%' IDENTIFIED by '$MARIADB_PWD';
GRANT ALL PRIVILEGES ON $MARIADB_DB.* TO $MARIADB_USER@'%';

/* Clears the priviliege cache on the MariaDB database for the changes to take effect*/
FLUSH PRIVILIEGES