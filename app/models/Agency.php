<?php

class Agency extends Elegant{

	public function divisions(){
        return $this->hasMany('Division');
    }

    public function contract(){
        return $this->belongsTo('Contract');
    }

	public static $rules = [
	  //'id'
	  //'active' //boolean default:TRUE
    	'contract_id' => 'required|exists:contracts',  // foreign index
		'name' => 'required|alpha_dash',               // critical invoice header detail
		'client_code' => 'unique:users',               // unique critical invoice header detail
		'contact_name' => 'required|alpha_dash',
		'contact_phone' => 'required|numeric|digits:10',
		'contact_ext' => 'numeric',
		'contact_fax' => 'numeric|digits:10',          // null
		'contact_email' => 'required|email',
		'bill_to_1' => 'required|alpha_dash',
		'bill_to_2' => 'alpha_dash',                   // null
		'street_1' => 'required|alpha_dash',
		'street_2' => 'alpha_dash',                    // null
		'building' => 'alpha_dash',                    // null
		'suite' => 'alpha_dash',                       // null
		'city' => 'required|alpha',
		'state' => 'required|alpha|digits:2',
		'zip' => 'required|numeric|digits:5'
      //'special_invoice_json_string' null
      //'deleted_at'
      //'created_at'
      //'updated_at'	
	];

	protected $fillable = array();
	protected $softDelete = true;

}