Blade Task 

Description

This project is a ** simple Task Management System **
built with Laravel 11 that provides managing user tasks. 
The project follows repository design patterns and incorporates clean code and refactoring principles.

The system Has Laravel Breeze which is a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation. In addition, Breeze includes a simple "profile" page where the user may update their name, email address, and password.
Key Features:
Tasks CRUD 

Use Cron Job to send daily report to users for pending tasks

Create a Custom Command  
php artisan make:command DailyMail

Register the Task Scheduler in routes/console.php

Schedule::command('app:daily-mail')->dailyAt('08:00');

Run the Scheduler Command Locally

 php artisan schedule:run
 
 If the command executes successfully, you should see log entries in the storage/logs/laravel.log file indicating that the cron job run :
 
[2024-10-29 14:06:45] local.INFO: Command run every day  



Technologies Used:

Laravel 11

PHP

MySQL

XAMPP (for local development environment)

Composer (PHP dependency manager)

Blade templating engine that is included with Laravel.

Installation Prerequisites

Ensure you have the following installed on your machine:

XAMPP: For running MySQL and Apache servers locally.

Composer: For PHP dependency management.

PHP: Required for running Laravel.

MySQL: Database for the project

Steps to Run the Project

Clone the Repository

https://github.com/batool193/Blade_Task.git

Navigate to the Project Directory

cd Blade_Task

Install Dependencies

composer install

Create Environment File

cp .env.example .env

Update the .env file with your database configuration (MySQL credentials, database name, etc.).

Run Migrations

php artisan migrate

Seed the Database

php artisan db:seed

Run the Application

php artisan serve
