<?php

class ClientRules extends BaseRules{

   public static $rules = [
      //'id');
        'division_id' => 'required|exists:divisions',// foreign index
      //'phone' boolean
      //'video' boolean
      //'sites' boolean
      //'trans' boolean
        'last_request' =>'date|date_format:Y-m-d H:i:s' // null
      //'deleted_at'
      //'created_at'
      //'updated_at'
	];
  
}