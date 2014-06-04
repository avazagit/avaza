<?php

class Interpreter extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
    protected $softDelete = true;

    //RELATIONSHIPS
    public function staff(){
        return $this->belongsTo('Staff');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

    //SCOPES

	
}