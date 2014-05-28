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

    protected function getAllColumns($table, $special_fields = array()){
        $query = 'SHOW COLUMNS FROM '.$table;
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
                $column_details = $this->getValidationByColumn($column_name, $column_data, $special_fields);
                $columns[] =
            }            
        }        
    }

    protected function getValidationByColumn($column_name, $column_data, $special_fields){
        $required = $column_data['Null'] == 'YES' ? 'required':NULL;
        $unique   = $column_data['Key']  == 'UNI' ? 'unique:' . strtolower(str_plural($column_name)):NULL;
        $validation = array();
        if(isset($required)){ $validation[] = $required; }
        if(isset($unique)){ $validation[] = $unique; }
        switch ($column_data['Type']){
            case 'int':
                    $validation[] = 'numeric';
                    if(!isset($column_array['Unsigned'])){
                        if(isset($special_fields['exact'])){
                            $validation[] = 'digits:' . $special_fields['exact'];
                        } else{                            
                            $validation[] = 'digits_between:2,' . $column_array['Length'];
                        }                        
                        return array($name => array($validation, $default));
                    } else{
                        $model = explode('_', $name)['0'];
                        $model = str_plural($model);
                        if(in_array($model, $foreign_keys)){
                            $model = $foreign_keys[$model];
                        }
                        $validation[] = 'exists:' . $model;
                    }
                }
                return FALSE;
            break;

            case 'tinyint':
                $validation[] = 'numeric';
                $validation[] = 'digits:1';                      
                return array($name => array($validation, $default));
            break;

            case 'decimal':
                $validation[] = 'regex:^\d{1,2}($|\.\d{1,2}$)^';
                return array($name => array($validation, $default));
            break;

            case 'varchar':
                if($exact_length == FALSE){
                    $validation[] = 'digits_between:2,' . $column_array['Length'];
                } else{
                    $validation[] = 'size:' . $exact_length;
                }                        
                return array($name => array($validation, $default));
            break;
 
            case 'text':       
                return array($name => array($validation, $default));
            break;

            case 'date':
                $validation[] = 'date';
                $validation[] = 'date_format:Y-m-d';
                return array($name => array($validation, $default));
            break;

            case 'time':
                $validation[] = 'date';
                $validation[] = 'date_format:H:i:s';
                return array($name => array($validation, $default));
            break;

            case 'datetime':
                $validation[] = 'date';
                $validation[] = 'date_format:Y-m-d H:i:s'
                return array($name => array($validation, $default));
            break;

            default:
                return FALSE;
            break;
        }
    }

}