<?php

class Schedule extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
    protected $softDelete = true;

    //RELATIONSHIPS
    public function schedulable(){
        return $this->morphTo();
    }

    public function language(){
        return $this->hasOne('Language');
    }

    //SCOPES

	
}