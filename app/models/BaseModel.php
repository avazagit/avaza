<?php

class BaseModel extends \Eloquent{
    
    protected $errors;
    public function validate($data){
        $validator = Validator::make($data, $this->getRules());
        if ($validator->fails()){
            $this->errors = $validator->errors;
            return false;
        }
        return true;
    }

    public function errors(){
        return $this->errors;
    }

    public function getFormFields($model_table, $special_fields){
    	return $this->getAllColumns($model_table, $special_fields);
    }

    protected function getAllColumns($model_table, $special_fields = array()){
        $query = 'SHOW COLUMNS FROM '.$model_table;
        $columns = array();
        foreach(DB::select($query) as $column){
            $delimiters = array('(', ') ');
            $ready = str_replace($delimiters, $delimiters[0], $column->Type);
            $split = explode($delimiters[0], $ready);
            if(!in_array($column->Field, $this->getGuarded())){
                $column_data = array(
                    'Null'     => $column->Null,
                    'Name'     => $column->Field,
                    'Default'  => $column->Default,
                    'Key'      => $column->Key == 'UNI' ? 'UNI':NULL,
                    'Type'     => isset($split['0']) ? $split['0']:NULL,
                    'Length'   => isset($split['1']) ? $split['1']:NULL,
                    'Unsigned' => isset($split['2']) ? $split['2']:NULL
                );
                $column_details = $this->getValidationByColumn($column_data, $special_fields);
                $columns[$column->Field] = $column_details;
            }            
        }
        return $columns;
    }

    protected function getValidationByColumn($column_data, $special_fields){
    	$name = $column_data['Name'];
    	$required = $column_data['Null'] == 'NO' ? 'required':NULL;
        $exact = isset($special_fields[$name]['exact']) ? $special_fields[$name]['exact']:FALSE;
        $unique   = $column_data['Key']  == 'UNI' ? 'unique:' . strtolower(str_plural($name)):NULL;
        $default = isset($column_data['Default']) ? $column_data['Default']:'';
        if(isset($required)){ $validators[] = $required; }
        if(isset($unique)){ $validators[] = $unique; }
        $field_type = 'text';
        switch ($column_data['Type']){
            case 'int':
                $validators[] = 'numeric';
                if(!isset($column_array['Unsigned'])){
                    if($exact == FALSE){
                    	$validators[] = 'digits_between:2,' . $column_data['Length'];
                    } else{                            
                        $validators[] = 'digits:' . $exact;
                    }
                    
                    break;
                } else{
                    $model = explode('_', $column_data['Name'])['0'];
                    if(in_array($model, $special_fields[$name])){
                        $model = $special_fields[$name][$model];
                    } else{
                    	$model = str_plural($model);
                    }
                    $validators[] = 'exists:' . $model;
                    break;
                }
            	break;

            case 'tinyint':
            	$field_type = 'checkbox';
                $validators[] = 'numeric';
                $validators[] = 'digits:1';                   
            	break;

            case 'decimal':
                $validators[] = 'regex:^\d{1,2}($|\.\d{1,2}$)^';
            	break;

            case 'varchar':
                if($exact == FALSE){
                    $validators[] = 'digits_between:2,' . $column_data['Length'];
                } else{
                    $validators[] = 'size:' . $exact;
                }
            	break;
 
            case 'text':
            	$field_type = 'textarea';
            	$validators[] = 'digits_between:10,500';
            	break;

            case 'date':
                $validators[] = 'date';
                $validators[] = 'date_format:Y-m-d';
            	break;

            case 'time':
                $validators[] = 'date';
                $validators[] = 'date_format:H:i:s';
            	break;

            case 'datetime':
                $validators[] = 'date';
                $validators[] = 'date_format:Y-m-d H:i:s';
            	break;

            case 'timestamp':
            	break;

            default:
            	break;
        }
        return array('validators' => $validators, 'type' => $field_type, 'default' => $default);
    }

}