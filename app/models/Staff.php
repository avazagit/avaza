<?php

class Staff extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
    protected $softDelete = true;

    //RELATIONSHIPS
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

    //SCOPES

	
}