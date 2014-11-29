<?php

namespace Admin;

class UsersController extends \BaseController {


    public function users()
    {
        $users = \User::all();
        $deleted_users = \User::onlyTrashed()->get()->lists('username', 'id');
        return \View::make('admin.users', compact('users', 'deleted_users'));
    }


    public function restoreUser()
    {
        $user_id = Input::get('user_id');
        User::onlyTrashed()->where('id', $user_id)->restore();
        Post::whereUserId($user_id)->restore();
        return Redirect::to('admin/users')->withSuccess(Lang::get('larabase.user_restored'));
    }


}