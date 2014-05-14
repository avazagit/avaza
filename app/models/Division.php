<?php

class Division extends \Eloquent {

	public function agency(){
        return $this->belongsTo('Agency');
    }

    public function client(){
        return $this->hasMany('Client');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = array();

}