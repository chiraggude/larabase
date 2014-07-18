<?php

use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
        //removes existing posts from table
        Post::truncate();

        $faker = Faker::create();
		foreach(range(1, 20) as $index)
		{
            Post::create([
            'user_id' => $faker->numberBetween(1,3),
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