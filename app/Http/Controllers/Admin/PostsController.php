<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PostsController extends Controller {


    public function posts()
    {
        return \view('admin.posts');
    }

    public function postsApi()
    {
        $posts = \Post::with(['user'=> function($query)
        {
            // getting the ID field is necessary
            $query->select(['id', 'username']);
            // user_id is required to enable eager loading
        }])->get(['id', 'title', 'status', 'user_id']);
        return \Response::json($posts);
    }

}