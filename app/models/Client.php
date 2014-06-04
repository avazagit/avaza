<?php

class Client extends BaseModel{

    //MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
    protected $softDelete = true;

    //RELATIONSHIPS
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

    //SCOPES

    
}