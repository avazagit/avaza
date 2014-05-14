<?php

class Interpreter extends \Eloquent {

	public function staff(){
        return $this->belongsTo('Staff');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = array();

}