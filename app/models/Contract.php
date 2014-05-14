<?php

class Contract extends \Eloquent {

	public function agencies(){
        return $this->hasMany('Agency');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
	protected $guarded[] = 'active';
	protected $guarded[] = 'manager_id';//FK Employee

}