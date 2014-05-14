<?php

class Employee extends Elegant{

	public function staff(){
        return $this->belongsTo('Staff');
    }

    public function contracts(){
        return $this->hasMany('Contract', 'manager_id');
    }
    
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'job_title', 50 => ,
		'employee_since' => ,
		'hourly_rate', 3, 2 => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}