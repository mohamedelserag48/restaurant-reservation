**Restaurant Reservation API**
This project is a Laravel-based RESTful API designed to manage restaurant reservations, table availability, menu listings, and order processing.

*Table of Contents*
--Installation
--Configuration
--Database Setup
--Docker Setup
--Installation
**Clone the repository:**

--git clone https://github.com/mohamedelserag48/restaurant-reservation
--cd restaurant-reservation
*Install dependencies:*

--composer install
--Generate application key:
--php artisan key:generate

*Configuration*
--Environment variables:

--Copy the .env.example to .env and configure your environment variables such as database credentials, mail settings, etc.


--cp .env.example .env
*Database Configuration:*

--Set up your database configuration in the .env file:


--DB_CONNECTION=mysql
--DB_HOST=127.0.0.1
--DB_PORT=3306
--DB_DATABASE=restaurant
--DB_USERNAME=root
--DB_PASSWORD=
*Database Setup*
*Migrate the database:*

Run the migrations to create the required tables and data.

php artisan migrate

php artisan db:seed
