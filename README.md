LaraBase
========

A Base app for developing Laravel projects

#### User Authentication
* User Registration & Login 
* Email Activation: An account activation email is sent the user's email for verification
* Password Reset: Resets the user password after sends reset instructions to the user's email
* User Profile: Users have a Public and Private profile (editable)
* Change Password: User can change password while logged in (from profile - to be moved to settings)
* Unique validation rules for login and registration
* More Coming soon...

## Installation and Setup

### Step 1 - Get LaraBase
**Option 1**: [Download LaraBase](https://github.com/chiraggude/larabase/archive/master.zip) and unzip it (remember to rename the folder to larabase)

**Option 2**: Git Clone `git clone https://github.com/chiraggude/larabase.git larabase`

### Step 2: Use Composer to install dependencies: 
```
cd larabase
composer install
```
### Step 3: Configure app Settings
**Database**: Create a new database and change the appropriate settings in `/app/config/database.php`

**Mail**: Configure your mail settings in `/app/config/mail.php`

### Step 4: Database Migrations and Seeding
Setup migrations table in DB: `php artisan migrate`

Seed the database: `php artisan db:seed`

### Step 5: Setup Development Tools (optional)
Autoload the following Service Providers in `/app/config/app.php`
```
'Way\Generators\GeneratorsServiceProvider',
'Barryvdh\Debugbar\ServiceProvider',
```
It is good practice to maintain different configurations for Local Development, Staging and Production. To set this up, read this short guide: [Configurations & Environments](https://github.com/chiraggude/larabase/wiki/Development-Environments-and-Configuration-in-Laravel)

### Step 6: Start using LaraBase
LaraBase Login: [http://localhost/larabase/public](http://localhost/larabase/public)

If you have seeded the database, you can Login at: [http://localhost/larabase/public/login](http://localhost/larabase/public/login)
`Email: admin@gmail.com   Password: password`

**Note**: The URL's depends on how you have configured your webserver.

## Upcoming Features
* Allow users to destroy their account (soft delete)
Coming soon...

## Pending
* Code refactoring (reduce ickiness)
* Nicer email templates
* Make code base more generic 
* Live Demo 

## Requirements
* PHP >= 5.4.0
* MCrypt PHP Extension
* Composer
