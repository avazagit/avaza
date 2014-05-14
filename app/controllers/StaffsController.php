<?php

class StaffsController extends \BaseController {

	/**
	 * Display a listing of staffs
	 *
	 * @return Response
	 */
	public function index()
	{
		$staffs = Staff::all();

		return View::make('staffs.index', compact('staffs'));
	}

	/**
	 * Show the form for creating a new staff
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('staffs.create');
	}

	/**
	 * Store a newly created staff in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Staff::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Staff::create($data);

		return Redirect::route('staffs.index');
	}

	/**
	 * Display the specified staff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$staff = Staff::findOrFail($id);

		return View::make('staffs.show', compact('staff'));
	}

	/**
	 * Show the form for editing the specified staff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$staff = Staff::find($id);

		return View::make('staffs.edit', compact('staff'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$staff = Staff::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Staff::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$staff->update($data);

		return Redirect::route('staffs.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Staff::destroy($id);

		return Redirect::route('staffs.index');
	}

}