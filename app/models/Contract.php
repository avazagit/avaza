<?php

class Contract extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
    protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at', 'purchase_order_numbers_json');
    protected $softDelete = true;

    //RELATIONSHIPS
    public function agencies(){
        return $this->hasMany('Agency');
    }

    public function divisions(){
        return $this->hasManyThrough('Division', 'Agency');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

    public function manager(){
        return $this->belongsTo('Employee', 'id', 'manager_id');
    }

    //SCOPES

	
}