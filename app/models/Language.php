<?php

class Language extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at', 'alternate_languages_json');
	protected $softDelete = true;

	//RELATIONSHIPS
	public function interpreters(){
        return $this->belongsToMany('Interpreter');
    }

    public function clients(){
        return $this->belongsToMany('Client');
    }

    public function schedules(){
        return $this->hasMany('Schedule');
    }

    //SCOPES

	
}