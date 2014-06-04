<?php

class AgencyRules extends BaseRules{

	public static $rules = [
	  //'id'
	  //'active' //boolean default:TRUE
    	'contract_id' => 'exists:contracts,id',  // foreign index
		'name' => 'required|digits_between:3,75',               // critical invoice header detail
		'client_code' => 'required|unique:agencies',               // unique critical invoice header detail
		'contact_name' => 'required|digits_between:3,75',
		'contact_phone' => 'required|numeric|digits:10',
		'contact_ext' => 'numeric',
		'contact_fax' => 'numeric|digits:10',          // null
		'contact_email' => 'required|email',
		'bill_to_1' => 'required|alpha_dash',
		'bill_to_2' => 'alpha_dash',                   // null
		'street_1' => 'required|digits_between:6,75',
		'street_2' => 'alpha_dash',                    // null
		'building' => 'alpha_dash',                    // null
		'suite' => 'alpha_dash',                       // null
		'city' => 'required|alpha',
		'state' => 'required|alpha|size:2',
		'zip' => 'required|numeric|digits:5'
      //'special_invoice_json_string' null
      //'deleted_at'
      //'created_at'
      //'updated_at'	
	];
	
}