LaraBase
========

A Base app for developing Laravel projects

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

### Step 5: Start using LaraBase
LaraBase Login: [http://localhost/larabase/public](http://localhost/larabase/public)

If you have seeded the database, you can Login at: [http://localhost/larabase/public/login](http://localhost/larabase/public/login)
`Email: admin@gmail.com   Password: password`

**Note**: The URL's depends on how you have configured your webserver.

## Requirements
* PHP >= 5.4.0
* MCrypt PHP Extension
* Composer
