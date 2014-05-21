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
      //'id');
        'division_id' => 'required|exists:divisions',// foreign index
      //'phone' boolean
      //'video' boolean
      //'sites' boolean
      //'trans' boolean
        'last_request' =>'date|date_format:Y-m-d H:i:s' // null
      //'deleted_at'
      //'created_at'
      //'updated_at'
	];

	protected $fillable = array();
	protected $softDelete = true;

}