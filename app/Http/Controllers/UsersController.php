<?php

namespace App\Http\Controllers;

class UsersController extends Controller {


    // Display all Users

    public function index()
    {
        $users = User::paginate(12);
        return view('users.index', compact('users'));
    }


    // Show Public Profile of user

    public function profile($username)
    {
        $user = User::whereUsername($username)->firstOrFail();
        $posts = $user->posts()->get(['id', 'title']);
        return view('users.public-profile', compact('user', 'posts'));
    }

}