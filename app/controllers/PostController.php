<?php

class PostController extends \BaseController {

    /**
     * Instantiate a new PostController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => ['index', 'show']));
    }

    /**
     * Display a listing of posts
     *
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(5);

        return View::make('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post
     *
     */
    public function create()
    {
        $user_id = Auth::user()->id;

        return View::make('posts.create', compact('user_id'));
    }

    /**
     * Store a newly created post in DB.
     *
     */
    public function store()
    {
        $data = Input::all();

        $validator = Post::validate($data);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        Post::create($data);
        Event::fire('post.created', array($data));
        return Redirect::route('posts.index')->withSuccess('Post created');
    }

    /**
     * Display the specified post
     *
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $user = User::findOrFail($post->user_id);
        return View::make('posts.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified post
     *
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return View::make('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage
     *
     */
    public function update($id)
    {
        $post = Post::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Post::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $post->update($data);
        return Redirect::route('posts.index')->withInfo('Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return Redirect::route('posts.index')->withInfo('Post Deleted');
    }

}