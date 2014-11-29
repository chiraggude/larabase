<?php


class UsersController extends BaseController {


    // Display all Users

    public function index()
    {
        $users = User::paginate(12);
        return View::make('user.index', compact('users'));
    }

}