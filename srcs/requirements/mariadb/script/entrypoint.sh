cat .setup 2> /dev/null

if [ $? -ne 0 ]; then
  
  #Launches in safe mode + "&" is used to execute the command in background.
  usr/bin/mysqld_safe --datadir=/var/lib/mysql &
  
  #Waits for the server to respond to requests.
  #If "mysqladmin ping" is null, meaning that the server stopped responding, the loop stops.
  while ! mysqladmin ping -h "$MARIADB_HOST" --silent
	do
    	sleep 1
	done

  #Creates the database
    eval "echo \"$(cat /tmp/create_db.sql)\"" | mariadb
    touch .setup
fi

#Starts mysql in safe mode 
usr/bin/mysqld_safe --datadir=/var/lib/mysql
