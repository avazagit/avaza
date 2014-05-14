<?php

class DivisionsController extends \BaseController {

	/**
	 * Display a listing of divisions
	 *
	 * @return Response
	 */
	public function index()
	{
		$divisions = Division::all();

		return View::make('divisions.index', compact('divisions'));
	}

	/**
	 * Show the form for creating a new division
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('divisions.create');
	}

	/**
	 * Store a newly created division in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Division::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Division::create($data);

		return Redirect::route('divisions.index');
	}

	/**
	 * Display the specified division.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$division = Division::findOrFail($id);

		return View::make('divisions.show', compact('division'));
	}

	/**
	 * Show the form for editing the specified division.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$division = Division::find($id);

		return View::make('divisions.edit', compact('division'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$division = Division::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Division::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$division->update($data);

		return Redirect::route('divisions.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Division::destroy($id);

		return Redirect::route('divisions.index');
	}

}