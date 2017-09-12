<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Post;
use App\Category;

class PostCategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('category_post')->truncate();

		$post_ids = Post::pluck('id')->toArray();
		$category_ids = Category::pluck('id')->toArray();
		$now = date('Y-m-d H:i:s');

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			DB::table('category_post')->insert([
				'post_id' => $faker->randomElement($post_ids),
				'category_id' => $faker->randomElement($category_ids),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}

}