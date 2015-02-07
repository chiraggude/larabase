<?php


class RolesTableSeeder extends Seeder {

	public function run()
	{
		//removes existing roles from table
		DB::table('roles')->delete();

		Role::create(['name'=> 'admin']);
		Role::create(['name'=> 'member']);
	}

}