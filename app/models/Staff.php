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
    
    public function permission(){
        return $this->morphOne('Permission', 'permissable');
    }
    
    public function schedules(){
        return $this->morphMany('Schedule', 'schedulable');
    }
    
    public function events(){
        return $this->morphMany('Event', 'eventable');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'employee_id' => ,
		'supervisor_id' => ,
		'supervisor_id' => ,
		'interpreter_id' => ,
		'interpreter_id' => ,
		'extension' => ,
		'primary_phone' => ,
		'secondary_phone' => ,
		'location_city', 50 => ,
		'location_state', 2 => ,
		'location_time_zone' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}