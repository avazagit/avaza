<?php

class Contract extends \Eloquent {

	public function agencies(){
        return $this->hasMany('Agency');
    }

    public function divisions(){
        return $this->hasManyThrough('Division', 'Agency');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = array();

}