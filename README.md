# Inmobiliaria Project
Simple real state system in which you can Create, Read, Update and Delete diferent type of properties. 
## Dependencies 
- PHP 8.1
- Laravel 10x
- Artisan
- Composer 2.2 or ^
- mySQL 8.0
- Laravel ui
- NPM Dependencies

## install dependences on Ubuntu

- PHP 8.1
~~~
sudo apt-get install php8.1
~~~

- composer 2.2 or ^
(https://getcomposer.org)

- Laravel 10x
- Artisan 
~~~
composer global require laravel/installer
~~~

- Mysql 8.0
(https://dev.mysql.com/downloads/mysql/)

- Laravel ui
~~~
composer require laravel/ui
~~~

- Generate Auth Scaffolding
~~~
php artisan ui bootstrap --auth
~~~

- Install NPM Dependencies
~~~
npm install && npm run dev
~~~

## install dependences on Windows
- PHP 8.1 
(https://windows.php.net/download#php-8.1-ts-vs16-x64)

- composer 2.2 or ^
(https://getcomposer.org)

- Laravel 10x
- artisan 
~~~
composer global require laravel/installer
~~~

- Mysql 8.0
(https://dev.mysql.com/downloads/mysql/)

- Laravel ui
~~~
composer require laravel/ui
~~~

- Generate Auth Scaffolding
~~~
php artisan ui bootstrap --auth
~~~

- Install NPM Dependencies
~~~
npm install && npm run dev
~~~

## Download and migrate the repository
open your terminal and run this command. 

~~~
git clone https://github.com/Felixis4/Inmobiliaria-project.git
~~~

configure your .env with your database

run this command for migrate
~~~
php artisan migrate
~~~

## Open localhost
run this command on your terminal 
~~~
php artisan serve
~~~