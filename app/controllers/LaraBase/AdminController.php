<?php


class AdminController extends BaseController {


    public function users()
    {
        $users = User::all();
        return View::make('admin.users', compact('users'));
    }

    public function deletedUsers()
    {
        $users = User::onlyTrashed()->get()->lists('username', 'id');
        return View::make('admin.deleted_users', compact('users'));
    }

    public function restoreUser()
    {
        $user_id = Input::get('user_id');
        User::onlyTrashed()->where('id', $user_id)->restore();
        Post::whereUserId($user_id)->restore();
        return Redirect::to('dashboard')->withSuccess(Lang::get('larabase.user_restored'));
    }

}