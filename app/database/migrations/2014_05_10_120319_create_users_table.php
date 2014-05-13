<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates the users table
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password'); // or ('password', 70) where 70  is hash length (Default is 255)
            $table->string('activation_code');
            $table->boolean('activated')->default(false);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('confirmed_on')->nullable();
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('email')->index();
            $t->string('token')->index();
            $t->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
    }

}
