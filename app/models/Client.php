<?php

class Client extends \Eloquent {

	public function division(){
        return $this->belongsTo('Division');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
	protected $guarded[] = 'last_request';
	protected $guarded[] = 'division_id';//FK Division

}