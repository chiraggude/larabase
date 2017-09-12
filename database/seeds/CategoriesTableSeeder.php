<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();

		Category::create(['name'=>'Sales & Marketing', 'description' => 'Lorem ipsum dolor sit amet, omittam platonem quodsi']);
		Category::create(['name'=>'Customer Support', 'description' => 'Lorem ipsum dolor sit amet, omittam platonem quodsi']);
		Category::create(['name'=>'Community', 'description' => 'Lorem ipsum dolor sit amet, omittam platonem quodsi']);
	}

}