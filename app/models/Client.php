<?php

class Client extends \Eloquent {

	public function division(){
        return $this->belongsTo('Division');
    }

    public function user(){
        return $this->morphOne('User', 'userable');//make unique
    }
    
    public function permission(){
        return $this->morphOne('Permission', 'permissable');//make unique
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