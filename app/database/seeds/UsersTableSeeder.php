<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        //removes existing users from table
        // truncate() is better than delete()
        // truncate() should not be used for tables in a Pivot table
        DB::table('users')->truncate();

        User::create(array(
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'activated' => true,
        ));

		$faker = Faker::create();
		foreach(range(1, 20) as $index)
		{
            User::create([
            'username' => $faker->unique()->userName,
            'password'=> Hash::make('password'),
            'email'=> $faker->unique()->freeEmail,
            'activated' => true
            ]);
		}
	}

}
