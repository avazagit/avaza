<?php

class Agency extends \Eloquent {

	public function divisions(){
        return $this->hasMany('Division');
    }

    public function contract(){
        return $this->belongsTo('Contract');
    }



	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at');
	protected $softDelete = true;

}