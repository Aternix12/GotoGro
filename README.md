# GotoGro

GotoGro is a stock management grocery app that allows managers to manage members and their transactions to help inform inventory. It is built using Laravel Native.

## Requirements

Please install the following requirements before proceeding with installation. They are used to provide CLI that is used to install and run Laravel.
Ensure that you have these installed on your machine, and that you can access them through your terminal, for example php -v.

[Composer] (<https://getcomposer.org/download/>)

[PHP] (<https://www.php.net/manual/en/install.php>)

[Node] (<https://nodejs.org/en/download/>)

[MySQL] (<https://dev.mysql.com/downloads/installer/>)

## Installation

1. Clone this repo (kinda useful) and go to its directory that you cloned to

2. Install Composer dependencies (a php dependency manager) within the project directory
'''
composer install
'''
3. Install NPM dependencies (a javascript dependency manager)
'''
npm install
'''
4. Create a copy of your .env file (this is a local environment file that is used to store local environment variables like database credentials, port, etc.)
'''
cp .env.example .env
'''
5. Generate an app encryption key (this is used to encrypt your app's user sessions and other encrypted data)
'''
php artisan key:generate
'''
6. Create an empty database for our application. (make sure to configure your .env file with the correct database information)
'''
mysql -u root -p
create database goto_gro
'''

7. Migrate and seed the database (this will create the tables and seed the database with dummy data that we make on the fly)
'''
php artisan migrate --seed
'''
8. Serve the application on the PHP development server
'''
php artisan serve
'''
Remember that pressing ctrl-c will stop the server from running.

9. Visit localhost:8000 in your browser to see the application running.

## Usage

We will get to this

## Laravel Documentation

This may look like a lot, but there are only a few areas we will need to understand to get started.
[Laravel Documentation if you feel like it] (<https://laravel.com/docs/10.x>)

-Views are located in resources/views. This is where we will be editing the HTML and CSS. (Presentation Layer)
-Controllers are located in app/Http/Controllers. This is where we will be editing the PHP. (Business Logic)
-Routes are located in routes/web.php. This is where we will be editing the routes that are used to access the controllers. (Routing)
-Models are located in app/Models. This is where we will be editing the models that are used to access the database. (Object Oriented Data Layer)
-The database is located in database/migrations. This is where we will be editing the database schema. (Data Layer)

## Branch Convention

To create a branch, please add Jira ticket number and a short description of the branch. For example, if I am working on ticket GOTO-1, I would create a branch called GOTO-1-branch-name. This will help us keep track of what branches are for what tickets.
Once you are done with your branch, please create a pull request and assign it to someone to review. Once it is reviewed, it will be merged into the main branch.
