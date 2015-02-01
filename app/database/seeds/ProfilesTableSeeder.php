<?php

use Faker\Factory as Faker;

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		//removes existing profiles from table
		DB::table('profiles')->delete();

		$faker = Faker::create();

		foreach(range(1, 21) as $index)
		{
			Profile::create([
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'user_id' => $faker->unique()->numberBetween(1,21),
				'location' => $faker->country()
			]);
		}
	}

}