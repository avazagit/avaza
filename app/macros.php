<?php
// get form fields and create form elements from model get_fields function then populate the entire form
Form::macro('generateByModel', function($model){
	$fields = $model::setInfo('fields');
	$layout = array();
	foreach($fields as $field_name => $field_array){
    	$field_caps = titleize($field_name);
    	$label = Form::label($field_name, $field_caps);
    	switch($field_array['type']){
    		case 'checkbox':
	    		$field = Form::checkbox($field_name);
	    		$layout[] = '<div class="checkbox">' . $label . $field . '</div>';
	    		break;
    		case 'select':
	    		$func_name = camel_case($field_name);
	    		$field = Form::$func_name();
	    		$layout[] = '<div class="form-group">' . $label . $field . '</div>';
	    		break;
    		default:
    			$field = Form::$field_type($field_name, null, array('class' => 'form-control'));
    			$layout[] = '<div class="form-group">' . $label . $field . '</div>';
    			break;
    	}
    return $layout;
});

Form::macro('contractId', function(){
	$contracts = Contract::remember(60)->lists('name', 'id');
	return Form::select('contract_id', $contracts, null, array('class' => 'form-control'));
});

public function titleize($string = NULL){
	if(isset($string)){
		$return_string = '';
		$replacers = array('_', '_id', ' ', ' id');
    	$replaced = str_replace($replacers, '~', $string);
		$splits = explode('~', $string);
		foreach($splits as $k => $split){
			$caps = strtoupper(substr($split, 0, 1));
			$rest = substr($split, 1);
			$space = isset($splits[$k+1]) ? ' ':'';
			$return_string.= $caps . $rest . $space;
		}
		return $return_string;
	}
}