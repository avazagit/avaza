<?php

class Interpreter extends Elegant{

	public function staff(){
        return $this->belongsTo('Staff');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'id_number' => 'required|numeric|digits:4|unique:interpreters',
		'interpreter_since' => 'required|date|date_format:Y-m-d H:i:s',
		'suspended_reason' => 'required_if:suspended,1|alpha|digits_between:3,20'
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}