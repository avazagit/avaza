<?php

class Division extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at', 'purchase_order_numbers_json');
    protected $softDelete = true;

    //RELATIONSHIPS
    public function agency(){
        return $this->belongsTo('Agency');
    }

    public function clients(){
        return $this->hasMany('Client');
    }

    //SCOPES

	
}