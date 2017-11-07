cp .env.example .env 

php artisan key:generate

mysql -u root -p

CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'laravel';

CREATE DATABASE `webapp` CHARACTER SET utf8 COLLATE utf8_general_ci;

GRANT ALL PRIVILEGES ON `webapp`.* TO 'laravel'@'localhost';

FLUSH PRIVILEGES;

exit



DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webapp
DB_USERNAME=laravel
DB_PASSWORD=laravel

php artisan config:cache

php artisan migrate

composer install

npm install

npm run production

composer install --optimize-autoloader

php artisan config:cache

php artisan route:cache
