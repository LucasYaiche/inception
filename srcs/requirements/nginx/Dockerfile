#Sets the base image for the new image as Alpine Linux version 3.14
FROM	alpine:3.14

#Updates the package list
RUN		apk update

#Installs nginx
RUN		apk add --no-cache --quiet --update nginx

#Installs openssl
RUN		apk add --no-cache --quiet --update openssl

#Creates a directory for storing SSL/TLS certificates and private keys
RUN		mkdir -p /etc/nginx/ssl /var/run/nginx

#Generates a self-signed SSL/TLS certificate and key pair using OpenSSL
RUN 	openssl req -x509 -nodes \
        -out /etc/nginx/ssl/lyaiche.42.fr.crt \
        -keyout /etc/nginx/ssl/lyaiche.42.fr.key \
        -subj "/C=FR/ST=IDF/L=Bruxelles/O=42/OU=42/CN=lyaiche.42.fr/UID=lyaiche"

COPY	conf/nginx.conf /etc/nginx/http.d/default.conf

#Listens on port 443
EXPOSE	443

#Starts the Nginx server process in the foreground and prevents 
#it from running as a background daemon
CMD	[ "nginx", "-g", "daemon off;" ]