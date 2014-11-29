<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
		return View::make('categories.index', compact('categories'));
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Category::validate($data = Input::all());
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		Category::create($data);
		return Redirect::route('admin.categories.index');
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);
		return View::make('categories.edit', compact('category'));
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);
		$validator = Category::validate($data = Input::all());
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$category->update($data);
		return Redirect::route('admin.categories.index');
	}

	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Category::destroy($id);
		return Redirect::route('admin.categories.index');
	}

}