<?php

class Agency extends Elegant{

	public function divisions(){
        return $this->hasMany('Division');
    }

    public function contract(){
        return $this->belongsTo('Contract');
    }

	public static $rules = [
		  'contract_id' => 'required|exists:contracts',
		         'name' => 'required|alpha_dash',
		  'client_code' => 'unique:users',
		 'contact_name' => 'required|alpha_dash',
		'contact_phone' => 'required|numeric|digits:10',
		  'contact_ext' => 'numeric',
		  'contact_fax' => 'numeric|digits:10',
		'contact_email' => 'email',
		    'bill_to_1' => 'required|alpha_dash',
		    'bill_to_2' => 'alpha_dash',
		     'street_1' => 'required|alpha_dash',
		     'street_2' => 'alpha_dash',
		     'building' => 'alpha_dash',
		        'suite' => 'alpha_dash',
		         'city' => 'required|alpha',
		        'state' => 'required|alpha|digits:2',
		          'zip' => 'required|numeric|digits:5'
	];

	protected $fillable = array();
	protected $softDelete = true;

}