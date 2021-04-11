FROM alpine

# install packages
RUN apk update
RUN apk add vim
RUN apk add openssl
RUN apk add nginx
RUN apk add php7-fpm php7-redis
RUN apk add --no-cache redis
# setup web server files and permissions
RUN mkdir /www
RUN mkdir -p /run/nginx

EXPOSE 80 6379

# setup ssl
RUN yes "" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout \
	/etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.crt


