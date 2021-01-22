# Smart House Manager

## This contains the application code for the Smart House Manager. The app is build on top of Laravel framework v8.21.0 which runs on the LAMP stack.
Web application that allows you to control your smart home. The application is a smart home device manager, with which you can monitor the states of devices, add, remove modules, configure plans for modules, enable / disable modules (in this example, imitation of actions). Examples of devices: lamp, socket, thermostat, boiler, camera, etc.
This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Assuming you've already installed on your machine: PHP (>= 8.0.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

Clone the repository

    git clone git@github.com:ArturTrotsky/smart-house-manager.git

Switch to the repo folder

    cd smart-house-manager

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Create а database "smart_house_manager"

    mysql -u root -p
    > create database smart_house_manager;
    > exit;

Set the database connection in .env

    APP_NAME=
    APP_URL=
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

Run the database migrations and run all database seeds

    php artisan migrate:refresh --seed

NPM install

    npm install

Create a symbolic link

    php artisan storage:link

Set the mail connection in .env

    MAIL_DRIVER=
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME=

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
