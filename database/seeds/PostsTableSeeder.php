<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Post;

class PostsTableSeeder extends Seeder {

	public function run()
	{
        //removes existing posts from table
        DB::table('posts')->delete();

        $faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
            Post::create([
            'title'=> $faker->paragraph(1),
            'content'=> $faker->paragraph(40),
            'status' => 'published',
            'user_id' => $faker->numberBetween(1,4)
            ]);
		}
	}

}