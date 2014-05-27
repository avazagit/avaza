<?php

class Language extends BaseModel{

	public function interpreters(){
        return $this->belongsToMany('Interpreter');
    }

    public function clients(){
        return $this->belongsToMany('Client');
    }

    public function schedules(){
        return $this->hasMany('Schedule');
    }


	


	public static $rules = [
	  //'id'
		'language' => 'required|unique:languages',
	  //'phonetic'                    // null
		'language_code' => 'required|digits:3|unique:languages',
		'country_of_origin' =>        // null
	  //'alternate_languages_json'    // null
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

	protected $fillable = array();
	protected $softDelete = true;
	
}