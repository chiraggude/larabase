<?php


use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		//removes existing roles from table
		DB::table('roles')->delete();

		Role::create(['name'=> 'admin']);
		Role::create(['name'=> 'member']);
	}

}