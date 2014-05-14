<?php

class Division extends \Eloquent {

	public function agency(){
        return $this->belongsTo('Agency');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
	protected $guarded[] = 'active';
	protected $guarded[] = 'agency_id';//FK Agency

}