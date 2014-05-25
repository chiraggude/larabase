<?php

class DevController extends BaseController {


    // Laravel Start page with DB connection check

    public function hello()
    {
        $environment = App::environment();
        $database = DB::connection()->getDatabaseName();
        return View::make('hello', compact('environment','database'));
    }

    // Check hashed password against DB

    public function password()
    {
        $user = User::findorFail(1);
        $current_pass = $user->password;
        $new_pass = Hash::make('password');
        $check1 = Hash::check('password', $current_pass);
        $check2 = Hash::check('password', $new_pass);
        return [$check1, $check2];
    }

}
