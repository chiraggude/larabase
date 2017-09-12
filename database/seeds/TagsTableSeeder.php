<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tags')->delete();

		Tag::create(['name'=>'Announcements']);
		Tag::create(['name'=>'Engineering']);
		Tag::create(['name'=>'Features']);

	}

}