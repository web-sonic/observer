FROM alpine

RUN apk update
RUN apk add php7-cli php7-redis
COPY srcs/Observer ./Observer
COPY srcs/client1.php ./client1.php

