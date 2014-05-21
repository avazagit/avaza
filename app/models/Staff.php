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

	public static $rules = [
      //'id'
		'employee_id' => 'exists:employees',           // null foreign index
		'supervisor_id' => 'required|exists:employees',// foreign index
		'interpreter_id' => 'exists:interpreters',     // null foreign index
		'extension' => 'numeric|digits:4',             // null
		'primary_phone' => 'required|numeric|digits:10',
		'secondary_phone' => '|numeric|digits:10',     // null
		'city' => 'required|alpha_dash|digits_between:5,50',
		'state' => 'required|alpha|digits:2',
		'time_zone' => 'required|alpha_dash'
      //'deleted_at'
      //'created_at'
      //'updated_at'
	];

	protected $fillable = array();
	protected $softDelete = true;

}