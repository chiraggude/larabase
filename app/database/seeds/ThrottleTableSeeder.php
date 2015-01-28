<?php

use Faker\Factory as Faker;

class ThrottleTableSeeder extends Seeder {

	public function run()
	{
		//removes existing throttle records from table
		DB::table('throttle')->delete();

		$faker = Faker::create();

		foreach(range(1, 21) as $index)
		{
			Throttle::create([
				'user_id' => $faker->unique()->numberBetween(1,21)
			]);
		}
	}

}