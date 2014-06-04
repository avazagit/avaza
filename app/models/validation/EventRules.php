<?php

class EventRules extends BaseRules{

	public static $rules = [
	  //id'
	  //'eventable_id'
	  //'eventable_type'
		'description' => 'required|alpha_dash|digits_between:2,254',
		'timestamp' => 'required|date|date_format:Y-m-d H:i:s'
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

}