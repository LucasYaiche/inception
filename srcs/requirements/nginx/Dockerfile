# #Sets the base image for the new image as Alpine Linux version 3.14
# FROM	alpine:3.14

# #Updates the package list
# RUN		apk update

# #Installs nginx
# RUN		apk add --no-cache --quiet --update nginx

# #Installs openssl
# RUN		apk add --no-cache --quiet --update openssl

# #Creates a directory for storing SSL/TLS certificates and private keys
# RUN		mkdir -p /etc/nginx/ssl /var/run/nginx

# #Generates a self-signed SSL/TLS certificate and key pair using OpenSSL
# RUN 	openssl req -x509 -nodes \
#         -out /etc/nginx/ssl/lyaiche.42.fr.crt \
#         -keyout /etc/nginx/ssl/lyaiche.42.fr.key \
#         -subj "/C=BE/ST=Belgium/L=Brussels/O=42/OU=42/CN=lyaiche.42.fr/UID=lyaiche"

# COPY	conf/nginx.conf /etc/nginx/http.d/default.conf

# #Listens on port 443
# EXPOSE	443

# #Starts the Nginx server process in the foreground and prevents 
# #it from running as a background daemon
# CMD	[ "nginx", "-g", "daemon off;" ]


 

FROM	alpine:3.14

# Update packet manager
RUN		apk update

# Install nginx and openssl
RUN		apk add --no-cache --quiet --update nginx
RUN		apk add --no-cache --quiet --update openssl

# Create directory for the certificate and key (for HTTPS)
#An SSL certificate is a digital certificate that authenticates a website's identity and enables an encrypted connection. 
#SSL stands for Secure Sockets Layer, a security protocol that creates an encrypted link between a web server and a web browser.
RUN		mkdir -p /etc/nginx/ssl

# Generate certificate and key
# req = certificate request and certificate generating utility.
# It can additionally create self signed certificates for use as root CAs for example.
# -x509 = self signed
# -nodes = if this option is specified then if a private key is created it will not be encrypted.
# -keyout = where to write the key
# -subj = info for ssl key Country,State,...
RUN 	openssl req -x509 -nodes \
	-out /etc/nginx/ssl/lyaiche.42.fr.crt \	
	-keyout /etc/nginx/ssl/lyaiche.42.fr.key \ 
	-subj "/C=BE/ST=Belgium/L=Brussels/O=42/OU=19/CN=lyaiche.42.fr/UID=lyaiche"

# Create directory for the nginx config files
RUN 	mkdir -p /var/run/nginx

# Copy config file on the container
COPY	conf/nginx.conf /etc/nginx/http.d/default.conf

# Expose the only port we're allowed to use in the subject
EXPOSE	443

# Start nginx in the foreground
CMD	[ "nginx", "-g", "daemon off;" ]