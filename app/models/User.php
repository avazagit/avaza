<?php

class User extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $fillable = array('email', 'password', 'first_name', 'last_name');
    protected $softDelete = true;

    //RELATIONSHIPS
    public function userable(){
        return $this->morphTo();
    }

    public function permission(){
        return $this->belongsTo('Permission');
    }

}