<?php

class Client extends Elegant{

	public function division(){
        return $this->belongsTo('Division');
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
		'division_id' => 'required|exists:divisions'
	];

	protected $fillable = array();
	protected $softDelete = true;

}