<?php

class Employee extends Elegant{

	public function staff(){
        return $this->belongsTo('Staff');
    }

    public function contracts(){
        return $this->hasMany('Contract', 'manager_id');
    }
    
	public static $rules = [
		'job_title' => 'required|alpha_dash|digits_between:5,50',
		'parking_extension' => 'required|numeric|digits:4',
		'pickup_extension' => 'required|numeric|digits:4',
		'employee_since' => 'required|date|date_format:Y-m-d H:i:s',
		'hourly_rate' => array('required', 'regex:^\d{1,3}($|\.\d{1,2}$)')
	];

	protected $fillable = array();
	protected $softDelete = true;

}