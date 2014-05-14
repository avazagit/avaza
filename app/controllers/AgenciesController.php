<?php

class AgenciesController extends \BaseController {

	/**
	 * Display a listing of agencies
	 *
	 * @return Response
	 */
	public function index()
	{
		$agencies = Agency::all();

		return View::make('agencies.index', compact('agencies'));
	}

	/**
	 * Show the form for creating a new agency
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('agencies.create');
	}

	/**
	 * Store a newly created agency in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Agency::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Agency::create($data);

		return Redirect::route('agencies.index');
	}

	/**
	 * Display the specified agency.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$agency = Agency::findOrFail($id);

		return View::make('agencies.show', compact('agency'));
	}

	/**
	 * Show the form for editing the specified agency.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$agency = Agency::find($id);

		return View::make('agencies.edit', compact('agency'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$agency = Agency::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Agency::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$agency->update($data);

		return Redirect::route('agencies.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Agency::destroy($id);

		return Redirect::route('agencies.index');
	}

}