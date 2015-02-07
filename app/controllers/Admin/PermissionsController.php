<?php

namespace Admin;

class PermissionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /permissions
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = \Permission::all();
		return \View::make('permissions.index', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /permissions
	 *
	 * @return Response
	 */
	public function store()
	{
		\Permission::create(\Input::all());
		return \Redirect::route('admin.permissions.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /permissions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = \Permission::find($id);
		return \View::make('permissions.edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /permissions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$permission = \Permission::findOrFail($id);
		$permission->update($data = \Input::all());
		return \Redirect::route('admin.permissions.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /permissions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\Permission::destroy($id);
		return \Redirect::route('admin.permissions.index');
	}

}