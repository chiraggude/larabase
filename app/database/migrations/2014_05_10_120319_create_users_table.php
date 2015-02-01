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
            $table->string('username', 50)->unique();
            $table->string('email', 50)->unique();
            $table->string('timezone', 50)->default('UTC');
            $table->boolean('activated')->default(false);
            $table->string('activation_code', 32);
            $table->string('password', 70);
            $table->rememberToken();
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
