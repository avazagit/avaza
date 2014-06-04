<?php

class EmployeeRules extends BaseRules{

	public static $rules = [
	  //'id'
		'job_title' => 'required|alpha_dash|digits_between:5,50',
		'parking_extension' => 'required|numeric|digits:4|unique:employees',// unique
		'pickup_extension' => 'required|numeric|digits:4',
		'employee_since' => 'required|date|date_format:Y-m-d H:i:s',
		'hourly_rate' => array('required', 'regex:^\d{1,3}($|\.\d{1,2}$)')// default:9.00
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

}