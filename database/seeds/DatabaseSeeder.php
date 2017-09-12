<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

		Eloquent::unguard();
        
        $this->call('PostsTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('PostTagTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('PostCategoryTableSeeder');
        $this->call('ThrottleTableSeeder');
        $this->call('ProfilesTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('PermissionRoleTableSeeder');
        $this->call('UsersTableSeeder');
        
    }
}
