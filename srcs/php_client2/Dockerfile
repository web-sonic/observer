FROM alpine

RUN apk update
RUN apk add php7-cli php7-redis
COPY Observer ./Observer
COPY client2.php ./client2.php
