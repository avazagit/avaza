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

	protected function getRules(){
		return $this->setInfo('rules');
	}

	public function getGuarded(){
		return $this->guarded;
	}

	public static $rules = array();

	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at', 'alternate_languages_json');
	protected $softDelete = true;


	protected function setInfo($purpose){
		$columns = Language::getFormFields('languages', array('language_code' => array('exact' => 3)));
		$rules = array();
		$fields = array();
		foreach($columns as $name => $detail){
			$rules[$name] = $detail['validators'];
			$fields[$name] = array('type' => $detail['type'], 'default' => $detail['default']);
		}
		return $$purpose;
	}
}