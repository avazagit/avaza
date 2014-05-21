<?php

class Language extends Elegant{

	public function interpreters(){
        return $this->belongsToMany('Interpreter');
    }

    public function clients(){
        return $this->belongsToMany('Client');
    }

    public function shcedules(){
        return $this->hasMany('Schedule');
    }

	public static $rules = [
	  //'id'
		'language' => 'required|unique:languages|aplha',
	  //'phonetic' // null
		'language_code' => 'required|digits:3|unique:languages|aplha',
		'country_of_origin' => 'alpha'// null
	  //'alternate_languages_json'    // null
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

	protected $fillable = array();
	protected $softDelete = true;
	
}