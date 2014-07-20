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
            $table->string('username', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->boolean('activated')->default(false);
            $table->string('password', 70);
            $table->string('activation_code', 32);
            $table->string('remember_token', 100)->nullable();
            $table->string('timezone')->default('UTC');
            $table->timestamp('last_login')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('token', 50);
            $table->timestamp('created_at');
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
