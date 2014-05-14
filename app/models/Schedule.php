<?php

class Schedule extends \Eloquent {

	public function schedulable(){
        return $this->morphTo();
    }

    public function language(){
        return $this->hasOne('Language');
    }


	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	// Don't forget to fill this array
	protected $fillable = array();

}