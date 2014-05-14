<?php

class Event extends Elegant{

	public function eventable(){
        return $this->morphTo();
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'eventable' => ,
		'description' => ,
		'timestamp' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}