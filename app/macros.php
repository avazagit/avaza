<?php
// get form fields and create form elements from model get_fields function then populate the entire form
Form::macro('generateByModel', function($model){
	$fields = $model::setInfo('fields');
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
    			$field = Form::text($field_name, $field_array['default'], array('class' => 'form-control'));
    			$layout[] = '<div class="form-group">' . $label . $field . '</div>';
    			break;
    	}
    }
    return $layout;
});

Form::macro('contractId', function(){
	$contracts = Contract::remember(60)->lists('name', 'id');
	return Form::select('contract_id', $contracts, null, array('class' => 'form-control'));
});

function titleize($string = NULL){
	if(isset($string)){
		$title = '';
		$replacers = array('_', '_id', ' ', ' id');
    	$replaced = str_replace($replacers, $replacers['0'], $string);
		$splits = explode($replacers['0'], $string);
		foreach($splits as $k => $split){
			$sp = $k = 0 ? '':' ';
			$title.= $sp . ucfirst($split);	
		}
		return $title;
	}
}