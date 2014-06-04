<?php

class Agency extends BaseModel{

	//MASS ASSIGNMENT AND DELETION VARIABLES
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at', 'special_invoice_json_string');
	protected $softDelete = true;

	//RELATIONSHIPS
	public function divisions(){
        return $this->hasMany('Division');
    }

    public function contract(){
        return $this->belongsTo('Contract', 'contract_id', 'id');
    }

    //SCOPES

	
}