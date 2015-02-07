<?php


class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		//removes existing permissions from table
		DB::table('permissions')->delete();

		Permission::create(['name'=> 'access_admin_routes', 'description' => 'User can access Admin routes']);
		Permission::create(['name'=> 'access_member_routes', 'description' => 'User can access Member routes']);
		Permission::create(['name'=> 'create_resource', 'description' => 'Create resource that belongs to the User']);
		Permission::create(['name'=> 'view_resource', 'description' => 'View resource that belongs to the User']);
		Permission::create(['name'=> 'edit_resource', 'description' => 'Edit resource that belongs to the User']);
		Permission::create(['name'=> 'update_resource', 'description' => 'Update resource that belongs to the User']);
		Permission::create(['name'=> 'delete_resource', 'description' => 'Delete resource that belongs to the User']);
	}

}