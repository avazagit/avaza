<?php

class Employee extends \Eloquent {

	public function staff(){
        return $this->belongsTo('Staff');
    }
    
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = array();

}