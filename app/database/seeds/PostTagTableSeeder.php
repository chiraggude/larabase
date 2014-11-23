<?php

class PostTagTableSeeder extends Seeder {

	public function run()
	{
		DB::table('post_tag')->truncate();

		foreach(range(1, 20) as $index)
		{
			// Numbers in rand() are thr ID's of Posts and Tags
			// These ID's should be present in the Posts and Tags table
			DB::table('post_tag')->insert([
				'post_id' => rand(1, 20),
				'tag_id' => rand(1,4)
			]);
		}
	}

}