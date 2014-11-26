<?php

class PostController extends \BaseController {

    /**
     * This Constructor is called after the creation of a new PostController object
     *
     */
    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => ['index', 'show', 'postsForTag']));
        $this->beforeFilter('owner', array('only' => ['edit', 'update', 'destroy']));
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
     * Display a list of posts for a User
     *
     */
    public function postsForUser($username)
    {
        $user = User::whereUsername($username)->first();
        $posts = $user->posts()->orderBy('updated_at', 'desc')->paginate(5);
        return View::make('posts.post_user', compact('posts','username'));
    }

    /**
     * Display a list of posts for a Tag
     *
     */
    public function postsForTag($tag_name)
    {
        $tag = Tag::where('name', $tag_name)->firstOrFail();
        $posts = $tag->posts()->orderBy('updated_at', 'desc')->paginate(5);
        return View::make('posts.post_tag', compact('posts', 'tag_name'));
    }

    /**
     * Show the form for creating a new post
     *
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $tags = DB::table('tags')->get(['id', 'name']);
        $default_tag_id = [Tag::first()->id];
        return View::make('posts.create', compact('user_id', 'default_tag_id', 'tags'));
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
        // remove quotes from tag_ids
        $tag_ids = array_map('intval', $data['tags']);
        $post = Post::create(['user_id'=>$data['user_id'], 'title'=>$data['title'], 'content'=>$data['content'], 'category'=>$data['category'], 'status'=>$data['status'], 'visibility'=>$data['visibility']]);
        //$post->save();
        $post->tags()->sync($tag_ids);
        Event::fire('post.created', array($data));
        return Redirect::route('posts.index')->withSuccess(Lang::get('larabase.post_created'));
    }

    /**
     * Display the specified post
     *
     */
    public function show($id)
    {
        $post = Post::with('user')->find($id);
        return View::make('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post
     *
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $selected_tags = $post->tags->lists('id');
        return View::make('posts.edit', compact('post', 'tags', 'selected_tags'));
    }

    /*
     * Update the specified resource in storage
     *
     */
    public function update($id)
    {
        $data = Input::all();
        $post = Post::findOrFail($id);
        $validator = Validator::make($data, Post::$rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // remove quotes from tag_ids
        $tag_ids = array_map('intval', $data['tags']);
        $post->update(['title'=>$data['title'], 'content'=>$data['content'], 'category'=>$data['category'], 'status'=>$data['status'], 'visibility'=>$data['visibility']]);
        $post->tags()->sync($tag_ids);
        return Redirect::route('posts.show', $id)->withInfo(Lang::get('larabase.post_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        // Delete all records on the pivot table for the Post
        Post::find($id)->tags()->detach();
        Post::destroy($id);
        return Redirect::route('posts.index')->withInfo(Lang::get('larabase.post_deleted'));
    }

}