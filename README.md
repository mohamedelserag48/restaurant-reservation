# Restaurant Reservation API

This project is a Laravel-based RESTful API designed to manage restaurant reservations, table availability, menu listings, and order processing.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Postman Collection](#postman-collection)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/mohamedelserag48/restaurant-reservation
    cd restaurant-reservation
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

## Configuration

1. **Environment variables:**

   Copy the `.env.example` file to `.env` and configure your environment variables such as database credentials, mail settings, etc.

    ```bash
    cp .env.example .env
    ```

2. **Database Configuration:**

   Set up your database configuration in the `.env` file:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=restaurant
    DB_USERNAME=root
    DB_PASSWORD=
    ```

## Database Setup

1. **Migrate the database:**

   Run the migrations to create the required tables and data.

    ```bash
    php artisan migrate
    ```

2. **Seed the database:**

    ```bash
    php artisan db:seed
    ```

## Postman Collection

1. **Import this collection:**

    ```bash
    https://api.postman.com/collections/35144604-c9ac374c-3c62-4219-916f-d634509e5424?access_key=PMAT-01J5HSP1Q0PQ1J35AX1P3DEJTG

    ```
