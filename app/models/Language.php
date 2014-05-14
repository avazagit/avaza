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

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'language' => ,
		'phonetic' => ,
		'language_code' => ,
		'country_of_origin' => ,
		'alternate_languages_json' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}