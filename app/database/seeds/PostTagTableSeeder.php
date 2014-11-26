<?php

use Faker\Factory as Faker;

class PostTagTableSeeder extends Seeder {

	public function run()
	{
		DB::table('post_tag')->truncate();

		$post_ids = Post::lists('id');
		$tag_ids = Tag::lists('id');
		$now = date('Y-m-d H:i:s');

		$faker = Faker::create();

		foreach(range(1, 20) as $index)
		{
			DB::table('post_tag')->insert([
				'post_id' => $faker->randomElement($post_ids),
				'tag_id' => $faker->randomElement($tag_ids),
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
	}

}