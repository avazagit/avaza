<?php

class Permission extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
    protected $softDelete = true;

    //RELATIONSHIPS
    public function users(){
        return $this->hasMany('User');
    }

    //SCOPES

	
}