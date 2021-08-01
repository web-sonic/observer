FROM debian:buster
LABEL maintainer='asvodyanov@gmail.com'

COPY /* /
RUN apt-get update && apt-get install -y procps vim wget
RUN apt-get -y install php7.3-fpm php7.3-common php7.3-readline php7.3-cli php7.3-gd php7.3-mysql php7.3-curl php7.3-opcache php7.3-pdo php7.3-imagick php7.3-simplexml php7.3-mbstring php7.3-gmp php7.3-intl php7.3-mbstring php7.3-xmlrpc php7.3-xml php7.3-zip php7.3-soap php7.3-imap
ENV DB_NAME=ck43709_test4
ENV DB_USER=ck43709_test4
ENV DB_PASSWORD=9ux_eYZ80#
RUN apt-get -y install nginx
RUN apt-get install -y mariadb-server
CMD ./start.sh