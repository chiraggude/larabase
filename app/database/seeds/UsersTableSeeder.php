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
            'activation_code' => 'de99a620c50f2990e87144735cd357e7',
            'activated' => true,
        ));

		$faker = Faker::create();
		foreach(range(1, 20) as $index)
		{
            User::create([
            'username' => $faker->unique()->userName,
            'password'=> Hash::make('password'),
            'email'=> $faker->unique()->freeEmail,
            'activation_code' => $faker->md5,
            'activated' => true,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName
            ]);
		}
	}

}
