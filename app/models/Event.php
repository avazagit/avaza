<?php

class Event extends \Eloquent {

	public function eventable(){
        return $this->morphTo();
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = array();

}