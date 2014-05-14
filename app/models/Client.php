<?php

class Client extends Elegant{

	public function division(){
        return $this->belongsTo('Division');
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
		'division_id' => ,
		'view_reports' => ,
		'leave_feedback' => ,
		'phone' => ,
		'video' => ,
		'on_site' => ,
		'translate' => ,
		'online_requests' => ,
		'last_request' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}