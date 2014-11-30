<?php


class UsersController extends BaseController {


    // Display all Users

    public function index()
    {
        $users = User::paginate(12);
        return View::make('users.index', compact('users'));
    }


    // Show Public Profile of user

    public function profile($username)
    {
        $user = User::whereUsername($username)->firstOrFail();
        $posts = $user->posts()->get(['id', 'title']);
        return View::make('users.public-profile', compact('user', 'posts'));
    }

}