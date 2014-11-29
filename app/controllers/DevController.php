<?php

class DevController extends \BaseController {


    // Laravel start page with some config checks
    public function hello()
    {
        $environment = App::environment();
        $database = DB::connection()->getDatabaseName();
        $admin_email = Config::get('larabase.admin_email');
        if(Schema::hasTable('users'))
        {
            $user = User::findorFail(1);
            // Check hashed password against DB
            $current_pass = $user->password;
            $new_pass = Hash::make('password');
            $check1 = Hash::check('password', $current_pass);
            $check2 = Hash::check('password', $new_pass);
            return View::make('hello', compact('environment','database','admin_email','check1','check2'));
        }
        $msg = 'Users table not found in DB';
        return View::make('hello', compact('environment','database','admin_email','msg'));
    }

}
