<?php

class Schedule extends Elegant{

	public function schedulable(){
        return $this->morphTo();
    }

    public function language(){
        return $this->hasOne('Language');
    }

	public static $rules = [
		'language_id' => 'required|exists:languages',
		'date' => 'required|date|date_format:Y-m-d',
		'start' => 'required|date|date_format:H:i:s',
		'differential' => array('required', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'event_json' => 'required',
		'recurrence_json' => 'required'
	];

	protected $fillable = array();
	protected $softDelete = true;

}