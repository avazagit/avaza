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

    public static function getFormFields($table, $special_fields){
    	return $this->getAllColumns($table, $special_fields);
    }

    protected function getAllColumns($table, $special_fields = array()){
        $query = 'SHOW COLUMNS FROM '.$table;
        $columns = array();
        foreach(DB::select($query) as $column){
            $delimiters = array('(', ') ');
            $ready = str_replace($delimiters, $delimiters[0], $column->Type);
            $split = explode($delimiters[0], $ready);
            if($column->Field != 'id'){
                $column_data = array(
                    'Null'     => $column->Null    != '' ? $column->Null:NULL,
                    'Name'     => $column->Field   != '' ? $column->Field:NULL,
                    'Default'  => $column->Default != '' ? $column->Default:NULL,
                    'Key'      => $column->Key == 'UNI'  ? 'UNI':NULL,
                    'Type'     => isset($split['0'])     ? $split['0']:NULL,
                    'Length'   => isset($split['1'])     ? $split['1']:NULL,
                    'Unsigned' => isset($split['2'])     ? $split['2']:NULL
                );
                $column_details = $this->getValidationByColumn($column_data, $special_fields);
                $columns[] = $column_details;
            }            
        }        
    }

    protected function getValidationByColumn($column_data, $special_fields){
    	$name = $special_fields['Name'];
    	$required = $column_data['Null'] == 'YES' ? 'required':NULL;
        $exact = isset($special_fields[$name]['exact']) ? $special_fields[$name]['exact']:FALSE;
        $unique   = $column_data['Key']  == 'UNI' ? 'unique:' . strtolower(str_plural($column_name)):NULL;
        $validators = array();
        if(isset($required)){ $validators[] = $required; }
        if(isset($unique)){ $validators[] = $unique; }
        switch ($column_data['Type']){
            case 'int':
            		$field_type = 'text';
                    $validators[] = 'numeric';
                    if(!isset($column_array['Unsigned'])){
                        if($exact == FALSE){
                        	$validators[] = 'digits_between:2,' . $column_data['Length'];
                        } else{                            
                            $validators[] = 'digits:' . $exact;
                        }
                        continue;
                    } else{
                        $model = explode('_', $column_data['Name'])['0'];
                        if(in_array($model, $special_fields[$name])){
                            $model = $special_fields[$name][$model];
                        } else{
                        	$model = str_plural($model);
                        }
                        $validators[] = 'exists:' . $model;
                        continue;
                    }
                }
                return FALSE;
            break;

            case 'tinyint':
            	$field_type = 'checkbox';
                $validators[] = 'numeric';
                $validators[] = 'digits:1';                        
            	continue;

            case 'decimal':
            	$field_type = 'text';
                $validators[] = 'regex:^\d{1,2}($|\.\d{1,2}$)^';
            	continue;

            case 'varchar':
            	$field_type = 'text';
                if($exact == FALSE){
                    $validators[] = 'digits_between:2,' . $column_data['Length'];
                } else{
                    $validators[] = 'size:' . $exact;
                }
            	continue;
 
            case 'text':
            	$field_type = 'textarea';
            	$validators[] = 'digits_between:10,500';
            	continue;

            case 'date':
            	$field_type = 'text';
                $validators[] = 'date';
                $validators[] = 'date_format:Y-m-d';
            	continue;

            case 'time':
            	$field_type = 'text';
                $validators[] = 'date';
                $validators[] = 'date_format:H:i:s';
            	continue;

            case 'datetime':
            	$field_type = 'text';
                $validators[] = 'date';
                $validators[] = 'date_format:Y-m-d H:i:s'
            	continue;

            default:
                return FALSE;
            	break;
        }
        return array($column_data['Name'] => array('validators' => $validators, 'field_type' => $field_type, 'default_value' => $column_data['default']));
    }

}