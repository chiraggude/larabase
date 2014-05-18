<?php

use Faker\Factory as Faker;

class ReportsTableSeeder extends Seeder {

	public function run()
	{
        //removes existing reports from table
        Report::truncate();

        $faker = Faker::create();
		foreach(range(1, 20) as $index)
		{
            Report::create([
            'user_id' => $faker->randomNumber(1,3),
            'title'=> $faker->paragraph(1),
            'content'=> $faker->paragraph(40),
            'category'=> $faker->word(1),
            'tag'=> $faker->word(1),
            'status' => 'published',
            'visibility' => 'public'
            ]);
		}
	}

}