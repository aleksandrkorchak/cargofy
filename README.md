# Cargofy
Simple test application "Cargo Exchange" where using a varied range of technologies, 
such as: 
1. __Laravel 7.0__
2. __Vue.js__
3. __Bootstrap 4__

Was used Laravel Homestead with:
1. __Php 7.4__
2. __Web-server Nginx__
3. __MySQL 5.7__
***

To install the application you need: 
1. Clone repository: 
	- `git clone https://github.com/aleksandrkorchak/cargofy.git`
2. Updates all packages and its dependencies: 
	- `composer install`	
3. Install the dependencies in the local node_modules folder: 
	- `npm install`
4. Create database "cargofy"
7. Change settings of the database in "__.env__" file. For Homestead:
   ```
   DB_CONNECTION=mysql
   DB_HOST=localhost
   DB_PORT=33060
   DB_DATABASE=cargofy
   DB_USERNAME=homestead
   DB_PASSWORD=secret
   ```
8. Drop all tables in the database, migrate and run all database seeds:
	- `php artisan migrate:refresh --seed`
9. To create the symbolic link:
    - `php artisan storage:link`
9. Set up domain on the Webserver
