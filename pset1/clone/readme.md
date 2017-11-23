1.instal composer dependencies
	
    composer install

2.publish all vendors

    php artisan vendor:publish

3.install nodejs dependencies

    npm install

3.compile frontend

    npm run production
4.rename .env.example to .env

    cp .env.example .env 

5.generate application key

    php artisan key:generate

6.set application name(if you need)

    php artisan app:name webapp

7.create database user and schema for our application (for example)

    mysql -u root -p

    CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'laravel';

    CREATE DATABASE `webapp` CHARACTER SET utf8 COLLATE utf8_general_ci;

    GRANT ALL PRIVILEGES ON `webapp`.* TO 'laravel'@'localhost';

    FLUSH PRIVILEGES;

    exit
8.type configuration data to .env

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=webapp
    DB_USERNAME=laravel
    DB_PASSWORD=laravel

9.confirm changes in .env

    php artisan config:cache

10.push tables to database

    php artisan migrate

11.optimize autoloader

    composer install --optimize-autoloader

12.optimize and clean routes

    php artisan route:cache














