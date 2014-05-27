LaraBase
========

LaraBase is a starter app for speeding up the development of Laravel projects. With basic knowledge of Laravel, LaraBase can be adapted and customized to your needs. The frontend of LaraBase was built with Bootstrap 3 and the authentican system was built in such a way that you could use it right away or modify AuthController.php to change the control flow. As far as possible, external packages were not used with the exception of [Generators](https://github.com/JeffreyWay/Laravel-4-Generators) and [Debugbar](https://github.com/barryvdh/laravel-debugbar)

#### Live Demo: [http://larabase.turizon.co.in/](http://larabase.turizon.co.in/)

#### Learn about Deployment, Environments etc from the [Wiki](https://github.com/chiraggude/larabase/wiki)

## Features
* Public Pages: Home, About, FAQ's, Feedback
* User Pages: Dashboard, Profile, Settings
* User Registration & Login/Logout  (includes - "remember me" option)
* Email Activation: An account activation email is sent the user's email for verification
* Password Reset: Resets the user password after sends reset instructions to the user's email
* User Profile: Users have a Public and Private profile (editable)
* Change Password: User can change password while logged in (from profile - to be moved to settings)
* Unique Validation Rules for login and registration
* Feedback forms are saved in DB and emailed to the Admin
* List of all Users with liks to their Public Profiles
* Responsive HTML email templates
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
* Reports resource to be changed to News
* Allow users to destroy their account (soft delete)
* Profile Pictures via Gravatar
* OAuth 1 & 2 - Login via FaceBook, Twitter, LinkedIn, Google, Microsoft, GitHub
* Tracks sign in count, last login,  timestamps and IP address
* Expires sessions that have no activity in a specified period of time
* User Suspension: A user can be temporarily banned from logging in to the app for a small interval (eg. 7 days)
* User Banning: Admins can add a user's email to a banned list. A banned user will not be allowed to create a new account with their existing emails or social accounts (potentially)
* Login Throttling: Locks an account after a specified number of failed sign-in attempts. Can unlock via email or after a specified time period.
* Role based Access Control (RBAC) – Super Admin, Group Admin, Users
* Permissions Types - Manage Everything, Manage a group of users, manage only themselves, manage certain resources, manage only certain actions in a resource

## Pending
* Code refactoring (reduce ickiness)
* Make code base more generic 
* 

## Requirements
* PHP >= 5.4.0
* MCrypt PHP Extension
* Composer

#### Thanks
[Mailchimp Email Blueprints](https://github.com/mailchimp/Email-Blueprints)
