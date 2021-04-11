FROM alpine

# install packages
RUN apk update
RUN apk add php-cli
RUN apk add vim
RUN apk add openssl
RUN apk add nginx
RUN apk add php7-fpm php7-redis
RUN apk add --no-cache redis
# setup web server files and permissions
RUN mkdir -p /run/nginx

RUN openssl req -newkey rsa:4096 -days 365 -nodes -x509 -subj \
"/C=RU/ST=Tatarstan/L=Kazan/O=School21/OU=Student/CN=ctragula/emailAddress=ctragula@student.21-school.ru"  \
-keyout /etc/ssl/private/nginx-ss.key -out /etc/ssl/certs/nginx-ss.crt

COPY srcs/default.conf /etc/nginx/conf.d/
COPY srcs/php.ini etc/php7/
COPY srcs/index.php var/www/localhost/
COPY srcs/publish.php var/www/localhost/

EXPOSE 80

# setup ssl
RUN yes "" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout \
	/etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt

COPY srcs/start.sh /
RUN chmod +x start.sh
CMD ./start.sh
