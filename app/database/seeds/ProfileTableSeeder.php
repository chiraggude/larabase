<?php

use Faker\Factory as Faker;

class ProfileTableSeeder extends Seeder {

	public function run()
	{
		//removes existing profiles from table
		DB::table('Profile')->delete();

		$faker = Faker::create();

		foreach(range(1, 21) as $index)
		{
			Profile::create([
				'user_id' => $faker->unique()->numberBetween(1,21)
			]);
		}
	}

}