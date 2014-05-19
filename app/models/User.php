<?php

class User extends Elegant{

	public function userable(){
        return $this->morphTo();
    }

    public function permission(){
        return $this->belongsTo('Permission');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'userable' => ,
		'email', 50 => ,
		'password', 40 => ,
		'first_name', 50 => ,
		'last_name', 50 => ,
		'activated' => ,
		'activation_code' => ,
		'activated_at' => ,
		'last_successful_login' => ,
		'reset_password_code' => ,
		'last_login_attempt' => ,
		'failed_login_attempts' => ,
		'locked' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}