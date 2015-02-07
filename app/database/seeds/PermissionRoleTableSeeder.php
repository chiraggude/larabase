<?php



class PermissionRoleTableSeeder extends Seeder {

	public function run()
	{

		DB::table('permission_role')->truncate();

		// Assign permissions for Admin role
		$admin_role = Role::whereName('admin')->get()->first();
		$admin_role->assignPermissions([1,2,3,4,5,6,7]);

		// Assign permissions for Member role
		$member_role = Role::whereName('member')->get()->first();
		$member_role->assignPermissions([2,3,4,5,6,7]);
	}

}