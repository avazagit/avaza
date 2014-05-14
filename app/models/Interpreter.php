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
		'id_number' => ,
		'available_now' => ,
		'interpreter_since' => ,
		'suspended' => ,
		'suspended_reason', 20 => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}