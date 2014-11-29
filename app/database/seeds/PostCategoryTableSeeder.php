<?php

use Faker\Factory as Faker;

class PostCategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('category_post')->truncate();

		$post_ids = Post::lists('id');
		$category_ids = Category::lists('id');
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