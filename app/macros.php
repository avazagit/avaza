<?php
// get form fields and create form elements from model get_fields function then populate the entire form
Form::macro('generateByModel', function($model){
	$fields = $model::getFields(str_plural($model));
	foreach($fields as $field_array){
    	$field_caps = titleize($field_array['name']);
    	$label = Form::label($field_array['name'], $field_caps);
    	$class = isset($field_array['class']) ? $field_array['class']:'form-control';
    	$container_class = isset($field_array['container_class']) ? $field_array['class']:'form_group';
    	switch($field_array['type']){
    		case 'checkbox':
	    		$field = Form::checkbox($field_array['name']);
	    		break;
    		case 'foreign':
	    		$field = Form::foreignSelectById($field_array['default'], $class);
	    		break;
    		case 'select':
	    		$field = Form::select($field_array['name'], $field_array['default'], null, array('class' => $class));
	    		break;
    		default:
    			$field = Form::text($field_array['name'], $field_array['default'], array('class' => $class));
    			break;
    	}
    	$layout[] = '<div class=' . $container_class . '>' . $label . $field . '</div>';
    }
    return $layout;
});

Form::macro('foreignSelectById', function($foreign_model, $class){
	$from_model = ucfirst($foreign_model);
	$list = $from_model::remember(60)->lists('name', 'id');
	return Form::select($foreign_model . '_id', $list, null, array('class' => $class));
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