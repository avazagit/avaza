<?php
// get form fields and create form elements from model get_fields function then populate the entire form
Form::macro('generateByModel', function($model){
	$fields = $model::getFields();
	$fields_array = array();
	foreach($fields as $field_name => $field_type){
    	if($field_name != 'id'){
	    	$field_break = explode('_', $field_name);
	    	$field_caps =  isset($field_break['1'] ) ? studly_case($field_break['0']) . ' ' . studly_case($field_break['1']) : studly_case($field_break['0']);
	    	$label = Form::label($field_name, $field_caps);
	    	if($field_type == 'select'){
	    		$func_name = camel_case($field_name);
	    		$field = Form::$func_name();
	    		$fields_array[] = '<div class="form-group">' . $label . $field . '</div>';
	    	} elseif($field_type == 'checkbox'){
	    		$field = Form::checkbox($field_name);

	    		$fields_array[] = '<div class="checkbox">' . $label . $field . '</div>';
	    	} else{
	    		$field = Form::$field_type($field_name, null, array('class' => 'form-control'));
	    		$fields_array[] = '<div class="form-group">' . $label . $field . '</div>';
	    	}
    	}	
    }  
    return $fields_array;
});

Form::macro('contractId', function(){
	$contracts = Contract::remember(60)->lists('name', 'id');
	return Form::select('contract_id', $contracts, null, array('class' => 'form-control'));
});