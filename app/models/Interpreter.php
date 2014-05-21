<?php

class Interpreter extends Elegant{

	public function staff(){
        return $this->belongsTo('Staff');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

	public static $rules = [
	  //'id'
		'id_number' => 'required|numeric|digits:4|unique:interpreters',
	  //'available_now'// boolean default:TRUE
		'interpreter_since' => 'required|date|date_format:Y-m-d H:i:s',
	  //'suspended'// boolean default:FALSE
		'suspended_reason' => 'required_if:suspended,1|alpha|digits_between:3,20'
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

	protected $fillable = array();
	protected $softDelete = true;

}