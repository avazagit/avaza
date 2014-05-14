<?php

class Schedule extends Elegant{

	public function schedulable(){
        return $this->morphTo();
    }

    public function language(){
        return $this->hasOne('Language');
    }


	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'schedulable' => ,
		'language_id' => ,
		'date' => ,
		'start' => ,
		'differential', 2, 2 => ,
		'event_json' => ,
		'recurrence_json' => ,
		'fulfilled' => ,
	];

	// Don't forget to fill this array
	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}