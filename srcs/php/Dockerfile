FROM alpine

# install packages
RUN apk update
RUN apk add vim supervisor openssl
RUN apk add --no-cache nginx
RUN apk add php7-fpm php7-redis php-cli

RUN mkdir -p /run/nginx

RUN openssl req -newkey rsa:4096 -days 365 -nodes -x509 -subj \
"/C=RU/ST=Tatarstan/L=Kazan/O=School21/OU=Student/CN=ctragula/emailAddress=ctragula@student.21-school.ru"  \
-keyout /etc/ssl/private/nginx-ss.key -out /etc/ssl/certs/nginx-ss.crt

RUN mkdir var/www/localhost/observer
COPY observer var/www/localhost/observer
COPY default.conf /etc/nginx/conf.d/
#COPY php.ini etc/php7/
COPY index.php var/www/localhost/
COPY listen.php var/www/localhost/

EXPOSE 6379

# setup ssl
RUN yes "" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout \
	/etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt

COPY supervisord.conf etc/
RUN chmod +x etc/supervisord.conf

#CMD ["usr/bin/supervisord"]
