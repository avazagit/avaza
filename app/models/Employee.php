<?php

class Employee extends \Eloquent {

	public function staff(){
        return $this->belongsTo('Staff');
    }
    
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
	protected $guarded[] = 'hourly_rate';
	protected $softDelete = true;

}