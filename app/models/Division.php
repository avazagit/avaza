<?php

class Division extends Elegant{

	public function agency(){
        return $this->belongsTo('Agency');
    }

    public function client(){
        return $this->hasMany('Client');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'active' => ,
		'agency_id' => ,
		'name' => ,
		'access_code' => ,
		'contact_name' => ,
		'contact_phone' => ,
		'contact_ext' => ,
		'contact_fax' => ,
		'contact_email' => ,
		'street_1' => ,
		'street_2' => ,
		'building' => ,
		'suite' => ,
		'city' => ,
		'county' => ,
		'state' => ,
		'zip' => ,
		'time_zone' => ,
		'otp_special_json_string' => ,
		'ons_special_json_string' => ,
		'vri_special_json_string' => ,
		'tsl_special_json_string' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}