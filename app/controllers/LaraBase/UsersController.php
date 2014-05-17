<?php
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class UsersController extends BaseController {

    // Displays the form for account creation
    public function index()
    {
        $users = User::paginate(10);
        return View::make('users.index', compact('users'));
    }

    // Displays the form for account creation
    public function publicProfile($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        return View::make('users.public_profile', compact('user'));
    }


}