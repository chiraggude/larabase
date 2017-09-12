<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Post;
use App\Feedback;

class AdminController extends Controller {

	/**
	 * Show Admin Dashboard
	 * GET /admin/dashboard
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		$users = DB::table('users')->count();
		$posts = Post::all()->count();
		$feedback = Feedback::all()->count();
		return view('admin.dashboard', compact('posts','users','feedback'));
	}



}