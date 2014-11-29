<?php

class TagsController extends \BaseController {

	/**
	 * Display a listing of tags
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::all();
		return View::make('tags.index', compact('tags'));
	}

	/**
	 * Store a newly created tag in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Tag::validate($data = Input::all());
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		Tag::create($data);
		return Redirect::route('admin.tags.index');
	}

	/**
	 * Show the form for editing the specified tag.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = Tag::find($id);
		return View::make('tags.edit', compact('tag'));
	}

	/**
	 * Update the specified tag in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tag = Tag::findOrFail($id);
		$validator = Tag::validate($data = Input::all());
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$tag->update($data);
		return Redirect::route('admin.tags.index');
	}

	/**
	 * Remove the specified tag from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tag::destroy($id);
		return Redirect::route('admin.tags.index');
	}

}
