<?php

class DivisionRules extends BaseRules{

	public static $rules = [
	  //'id'
	  //'active'// boolean default TRUE
		'agency_id' => 'required|numeric',// foreign index
		'name' => 'required|alpha_dash|digits_between:4,70',  // critical invoice line detail
		'access_code' => 'required|unique:divisions|digits:6',// critical invoice line detail
		'contact_name' => 'required|alpha_dash|digits_between:4,50',
		'contact_phone' => 'required|numeric|digits:10',
		'contact_ext' => 'numeric|digits_between:2,6',// null
		'contact_fax' => 'numeric|digits:10',         // null
		'contact_email' => 'required|email',
		'street_1' => 'required|alpha_dash',
		'street_2' => 'alpha_dash',  // null
		'building' => 'alpha_dash',  // null
		'suite' => 'alpha_dash',     // null
		'city' => 'required|alpha',
		'county' => 'required|alpha',// null
		'state' => 'required|alpha|digits:2',
		'zip' => 'required|numeric|digits:5',
		'time_zone' => 'required|alpha_dash'
	  //'otp_special_json_string'// null
	  //'ons_special_json_string'// null
	  //'vri_special_json_string'// null
	  //'tsl_special_json_string'// null
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

}