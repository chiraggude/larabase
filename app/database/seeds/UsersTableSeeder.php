<?php

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        //removes existing users from table
        User::truncate();

        User::create(array(
            'username' => 'admin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
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
            'activated' => true,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            ]);
		}
	}

}
