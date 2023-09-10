# GotoGro

GotoGro is a stock management grocery app that allows managers to manage members and their transactions to help inform inventory. It is built using Laravel Native.

## Requirements

Please install the following requirements before proceeding with installation. They are used to provide CLI that is used to install and run Laravel.
Ensure that you have these installed on your machine, and that you can access them through your terminal, for example php -v.

[Composer] (<https://getcomposer.org/download/>)

[PHP] (<https://www.php.net/manual/en/install.php>)
Please make sure that you enable the following extensions in your php.ini file by removing the preceding semicolon (;):

- extension=fileinfo
- extension=zip

[Node] (<https://nodejs.org/en/download/>)

[XAMPP] (<https://www.apachefriends.org/download.html>)
This is for the database. You can use whatever you want, but this is the easiest to use.
MySQL is the database that we will be using, and it is included in XAMPP. 
To run the database, you will need to start the Apache and MySQL modules in XAMPP.

## Installation

1. Clone this repo (kinda useful) and go to its directory that you cloned to

2. Install Composer dependencies (a php dependency manager) within the project directory

```
composer install
```

3. Install NPM dependencies (a javascript dependency manager)

```
npm install
```

4. Create a copy of your .env file (this is a local environment file that is used to store local environment variables like database credentials, port, etc.)

```
cp .env.example .env
```

5. Generate an app encryption key (this is used to encrypt your app's user sessions and other encrypted data)

```
php artisan key:generate
```

6. Create an empty database for our application. (make sure to configure your .env file with the correct database information)

```
Use xampp to create the database goto_gro. Make sure the user is the same as in the .env. The password should be blank.
You can launch phpmyadmin from xampp to do this under MySQL.
```

7. Migrate and seed the database (this will create the tables and seed the database with dummy data that we make on the fly)

```
php artisan migrate --seed
```

8. Serve the application on the PHP development server. Well done, the application is now running on your machine. (this will start the server on port 8000)

```
php artisan serve
```

Remember that pressing ctrl-c will stop the server from running.

9. Visit localhost:8000 in your browser to see the application running.

## Usage

We will get to this

## Development Guide

This may look like a lot, but there are only a few areas we will need to understand to get started.
[Laravel Documentation if you feel like it] (<https://laravel.com/docs/10.x>)

ChatGPT is your friend. You will likely get the answer you are looking for as this is a basic Laravel project and there are many resources online.

- Views are located in resources/views. This is where we will be editing the HTML and CSS. (Presentation Layer)
- Controllers are located in app/Http/Controllers. This is where we will be editing the PHP. (Business Logic)
- Routes are located in routes/web.php. This is where we will be editing the routes that are used to access the controllers. (Routing)
- Models are located in app/Models. This is where we will be editing the models that are used to access the database. (Object Oriented Data Layer)
- The database schema is located in database/migrations. This is where we will be editing the database schema and dummy data. (Data Layer)


To first get the database full of the tables and dummy data, we will need to run the following command:

```
php artisan migrate:fresh --seed
```

This will drop all the tables and recreate them with the dummy data. This is useful if you want to start fresh.

Then to run the application, we will need to run the following command:

```
php artisan serve
```
Then, visit the following address for the member create page:
localhost:8000/members/create

### Views (Webpages)
Views are located in resources/views. This is where we will be editing the HTML and CSS and using blade. Blade is a templating engine that allows us to use PHP in our HTML. This is useful for things like loops and conditionals. For example, if we want to loop through a list of members and display their names, we can do something like this:

```
@foreach ($members as $member)
    <p>This is member {{ $member->id }}</p>
@endforeach
```

A good example of this is under resources/views/member/index.blade.php, which is our member create form that is currently working.

This will loop through the members and display their id. The $members variable is passed from the controller to the view.

### Controllers (Business Logic)
Controllers are located in app/Http/Controllers. This is where we will be editing the PHP. Controllers are used to handle requests and return responses, for example CRUD and other business logic. For example, if we want to return a view, we can do something like this:

```
public function index()
{
    return view('member.index');
}
```

This will return the view located in resources/views/members/index.blade.php.

### Routes 
Routes are located in routes/web.php. This is where we will be editing the routes that are used to access the controllers. For example, if we want to access the index function in the MemberController, we can do something like this:

```
Route::get('/members', [MemberController::class, 'index']);
```

This will access the index function in the MemberController. We will get to models later.

## Branch Convention

To create a branch, please add Jira ticket number and a short description of the branch. For example, if I am working on ticket GOTO-1, I would create a branch called GOTO-1-branch-name. This will help us keep track of what branches are for what tickets.
Once you are done with your branch, please create a pull request and assign it to someone to review. Once it is reviewed, it will be merged into the main branch.
