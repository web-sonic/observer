chown www-data: -R /var/www
service mysql start
mysql -uroot -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"
mysql -uroot -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD'";
mysql -uroot -e "FLUSH PRIVILEGES;"
mysql ck43709_test4 < ck43709_test4.sql
mv default /etc/nginx/sites-available/default
service nginx start
service php7.3-fpm start

bash