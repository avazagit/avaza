<?php

class Agency extends Elegant{

	public function divisions(){
        return $this->hasMany('Division');
    }

    public function contract(){
        return $this->belongsTo('Contract');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'active' => ,
		'contract_id' => ,
		'name' => ,
		'client_code' => ,
		'contact_name' => ,
		'contact_phone' => ,
		'contact_ext' => ,
		'contact_fax' => ,
		'contact_email' => ,
		'bill_to_1' => ,
		'bill_to_2' => ,
		'street_1' => ,
		'street_2' => ,
		'building' => ,
		'suite' => ,
		'city' => ,
		'state' => ,
		'zip' => ,
		'special_invoice_json_string' => ,
		
	];

	protected $fillable = array();
	protected $softDelete = true;

}