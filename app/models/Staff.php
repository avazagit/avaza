<?php

class Staff extends Elegant{

	public function employee(){
        return $this->hasOne('Employee');
    }

    public function interpreter(){
        return $this->hasOne('Interpreter');
    }

    public function supervisor(){
        return $this->hasOne('Employee', 'id', 'supervisor_id');
    }

    public function user(){
        return $this->morphOne('User', 'userable');
    }
        
    public function schedules(){
        return $this->morphMany('Schedule', 'schedulable');
    }
    
    public function events(){
        return $this->morphMany('Event', 'eventable');
    }

	// Add your validation rules here
	public static $rules = [
		'employee_id' => 'exists:employees',
		'supervisor_id' => 'required|exists:employees',
		'interpreter_id' => 'exists:interpreters',
		'extension' => 'numeric|digits:4',
		'primary_phone' => 'required|numeric|digits:10',
		'secondary_phone' => '|numeric|digits:10',
		'location_city' => 'required|alpha_dash|digits_between:5,50',
		'location_state' => 'required|alpha|digits:2',
		'location_time_zone' => 'required|alpha_dash',
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}