<?php

class Event extends Elegant{

	public function eventable(){
        return $this->morphTo();
    }

	// Add your validation rules here
	public static $rules = [
		'description' => 'required|alpha_dash|digits_between:2,254',
		'timestamp' => 'required|date|date_format:Y-m-d H:i:s'
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}