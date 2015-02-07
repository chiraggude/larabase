<?php

namespace Admin;

class UsersController extends \BaseController {


    public function users()
    {
        $users = \User::all();
        $deleted_users = \User::onlyTrashed()->lists('username', 'id');
        $suspended_users = \Throttle::where('suspended', 1)->count();
        $banned_users = \Throttle::where('banned', 1)->lists('user_id', 'user_id');
        $users_list = \User::all()->lists('username', 'id');
        $roles_list = \Role::lists('name', 'id');
        return \View::make('admin.users', compact('users', 'deleted_users', 'suspended_users', 'users_list', 'banned_users', 'roles_list'));
    }


    public function assignUserRoles()
    {
        $user = \User::findOrFail(\Input::get('user_id'));
        $user->assignRole(\Input::get('roles'));
        return \Redirect::to('admin/users');
    }


    public function restoreUser()
    {
        $user_id = \Input::get('user_id');
        \User::onlyTrashed()->where('id', $user_id)->restore();
        \Post::whereUserId($user_id)->restore();
        return \Redirect::to('admin/users')->withSuccess(\Lang::get('larabase.user_restored'));
    }


    public function banUser()
    {
        \DB::table('throttle')->whereUserId(\Input::get('ban_user_id'))->update(['banned' => 1]);
        return \Redirect::to('admin/users')->withSuccess(\Lang::get('larabase.user_ban'));
    }


    public function revokeBanUser()
    {
        \DB::table('throttle')->whereUserId(\Input::get('banned_user_id'))->update(['banned' => 0]);
        return \Redirect::to('admin/users')->withSuccess(\Lang::get('larabase.user_ban_revoke'));
    }


}