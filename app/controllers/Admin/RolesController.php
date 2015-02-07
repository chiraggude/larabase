<?php

namespace Admin;

class RolesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /roles
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = \Role::all();
		return \View::make('roles.index', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /roles
	 *
	 * @return Response
	 */
	public function store()
	{
		$role = \Role::create(['name' => \Input::get('name')]);
		$role->assignPermissions(\Input::get('permissions'));
		return \Redirect::route('admin.roles.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /roles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = \Role::find($id);
		//return $role->permissions->lists('id');
		return \View::make('roles.edit', compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /roles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$role = \Role::findOrFail($id);
		$role->update(\Input::all());
		$role->assignPermissions(\Input::get('permissions'));
		return \Redirect::route('admin.roles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /roles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\Role::destroy($id);
		return \Redirect::route('admin.roles.index');
	}

}