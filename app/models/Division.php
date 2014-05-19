<?php

class Division extends Elegant{

	public function agency(){
        return $this->belongsTo('Agency');
    }

    public function clients(){
        return $this->hasMany('Client');
    }

	public static $rules = [
		'agency_id' => 'required|numeric',
		'name' => 'required|alpha_dash|digits_between:4,70',
		'access_code' => 'required|unique:divisions|digits:6',
		'contact_name' => 'required|alpha_dash|digits_between:4,50',
		'contact_phone' => 'required|numeric|digits:10',
		'contact_ext' => 'numeric|digits_between:2,6',
		'contact_fax' => 'numeric|digits:10',
		'contact_email' => 'required|email',
		'street_1' => 'required|alpha_dash',
		'street_2' => 'alpha_dash',
		'building' => 'alpha_dash',
		'suite' => 'alpha_dash',
		'city' => 'required|alpha',
		'county' => 'required|alpha',
		'state' => 'required|alpha|digits:2',
		'zip' => 'required|numeric|digits:5',
		'time_zone' => 'required|alpha_dash'
	];

	protected $fillable = array();
	protected $softDelete = true;

}