<?php

class UserRules extends BaseRules{

	public static $rules = [
	  //'id'
	  //'userable_id'
	  //'userable_type'
		'email' => 'required|unique:users|email|digits_between:5,50',
		'password' => 'required',
		'first_name' => 'required|digits_between:5,50',
		'last_name' => 'required|digits_between:5,50',
	  //'activated'// boolean default:FALSE
		'activation_code' => 'alpha',                             // null
		'activated_at' => 'date|date_format:Y-m-d H:i:s',         // null
		'last_successful_login' => 'date|date_format:Y-m-d H:i:s',// null
		'reset_password_code' => 'alpha',                         // null
		'last_login_attempt' => 'date|date_format:Y-m-d H:i:s',   // null
		'failed_login_attempts' => 'numeric'                      // null
	  //'locked'// boolean default:FALSE
	  //'deleted_at'
      //'created_at'
      //'updated_at'
	];

}