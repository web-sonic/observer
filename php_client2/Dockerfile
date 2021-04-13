FROM alpine

RUN apk update
RUN apk add php7-cli php7-redis
COPY srcs/Observer ./Observer
COPY srcs/client2.php ./client2.php
