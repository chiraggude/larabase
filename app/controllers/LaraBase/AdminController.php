<?php


class AdminController extends BaseController {


    public function users()
    {
        $users = User::all();
        $user_list = DB::table('users')->lists('username');
        $user_format = $users->lists('username');
        return View::make('admin.users', compact('users'));
    }

}