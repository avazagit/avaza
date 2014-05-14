<?php

class PermissionsController extends \BaseController {

	/**
	 * Display a listing of permissions
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = Permission::all();

		return View::make('permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new permission
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('permissions.create');
	}

	/**
	 * Store a newly created permission in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Permission::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Permission::create($data);

		return Redirect::route('permissions.index');
	}

	/**
	 * Display the specified permission.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$permission = Permission::findOrFail($id);

		return View::make('permissions.show', compact('permission'));
	}

	/**
	 * Show the form for editing the specified permission.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = Permission::find($id);

		return View::make('permissions.edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$permission = Permission::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Permission::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$permission->update($data);

		return Redirect::route('permissions.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Permission::destroy($id);

		return Redirect::route('permissions.index');
	}

}