<?php

class InterpretersController extends \BaseController {

	protected $layout = 'layouts.crud';

	/**
	 * Display a listing of interpreters
	 *
	 * @return Response
	 */
	public function index()
	{
		$interpreters = Interpreter::all();
		$this->layout->model_name = 'Interpreter';
		$this->layout->content = View::make('interpreters.index', compact('interpreters'));
	}

	/**
	 * Show the form for creating a new interpreter
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->model_name = 'Interpreter';
		$this->layout->content = View::make('interpreters.create');
	}

	/**
	 * Store a newly created interpreter in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), InterpreterRules::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Interpreter::create($data);

		return Redirect::route('interpreters.index');
	}

	/**
	 * Display the specified interpreter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$interpreter = Interpreter::findOrFail($id);
		$this->layout->model_name = 'Interpreter';
		$this->layout->content = View::make('interpreters.show', compact('interpreter'));
	}

	/**
	 * Show the form for editing the specified interpreter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$interpreter = Interpreter::find($id);
		$this->layout->model_name = 'Interpreter';
		$this->layout->content =  View::make('interpreters.edit', compact('interpreter'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$interpreter = Interpreter::findOrFail($id);

		$validator = Validator::make($data = Input::all(), InterpreterRules::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$interpreter->update($data);

		return Redirect::route('interpreters.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Interpreter::destroy($id);

		return Redirect::route('interpreters.index');
	}

}