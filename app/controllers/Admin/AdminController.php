<?php

namespace Admin;

class AdminController extends \BaseController {

	/**
	 * Show Admin Dashboard
	 * GET /admin/dashboard
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$users = \DB::table('users')->count();
		$posts = \Post::all()->count();
		$feedback = \Feedback::all()->count();
		return \View::make('admin.dashboard', compact('posts','users','feedback'));
	}



}