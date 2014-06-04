<?php

class LanguagesController extends \BaseController {
	protected $layout = 'layouts.crud';
	/**
	 * Display a listing of languages
	 *
	 * @return Response
	 */
	public function index(){
		$languages = Language::all();
		$model_name = 'Language';
		$this->layout->model_name = $model_name;
		$this->layout->content = View::make('languages.index', compact('languages', 'model_name'));
	}

	/**
	 * Show the form for creating a new language
	 *
	 * @return Response
	 */
	public function create(){	
		$model_name = 'Language';
		$this->layout->model_name = $model_name;
		$this->layout->content = View::make('languages.create');
	}

	/**
	 * Store a newly created language in storage.
	 *
	 * @return Response
	 */
	public function store(){
        $validator = Validator::make($data = Input::all(), LanguageRules::$rules);
        if ($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Language::create($data);

		return Redirect::route('languages.index');
	}

	/**
	 * Display the specified language.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$language = Language::findOrFail($id);
		$model_name = 'Language';
		$this->layout->model_name = $model_name;
		$this->layout->content = View::make('languages.show', compact('language', 'model_name'));
	}

	/**
	 * Show the form for editing the specified language.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$language = Language::find($id);
		$model_name = 'Language';
		$this->layout->model_name = $model_name;
		$this->layout->content = View::make('languages.edit', compact('language', 'model_name'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$language = Language::findOrFail($id);
		$validator = Validator::make($data = Input::all(), LanguageRules::$rules);
		if ($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$language->update($data);
		return Redirect::route('languages.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Language::destroy($id);

		return Redirect::route('languages.index');
	}

}