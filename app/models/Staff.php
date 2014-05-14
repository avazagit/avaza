<?php

class Staff extends \Eloquent {

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
	];

	// Don't forget to fill this array
	protected $fillable = array();

}