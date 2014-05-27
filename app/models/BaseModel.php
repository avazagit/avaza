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

    public static function getAllColumns($table){
        $columns = array();
        $query = 'SHOW COLUMNS FROM '.$table;
        foreach(DB::select($query) as $column){
            $type_split = explode('(', $column->Type);
            $column_type = $type_split['0'];
            $length_split = isset($type_split['1']) ? explode(') ', $type_split['1']):array('');
            $column_length = $length_split['0'];
            $column_setting = isset($length_split['1']) ? TRUE:FALSE;
            $columns[] = array(
                'Field' => array(
                    'Type'     => $column_type,
                    'Null'     => $column->Null,
                    'Default'  => $column->Default,
                    'Key'      => $column->Key,
                    'Length'   => $column_length,
                    'Unsigned' => $column_setting
                )
            );
        }
        return $columns;
    }

    public static function getValidationByColumn($name, $column_array, $exact_length = FALSE){
        $required = $column_array['Null'] == 'YES' ? 'required':null;
        $unique   = $column_array['Key']  == 'UNI' ? 'unique:' . strtolower(str_plural($name)):null;
        $validation = array();
        $validation[] = isset($required) ? $required:'';
        $validation[] = isset($unique) ? $unique:'';
        switch ($column_array['Type']){
            case 'int':
                if(column_array['Key'] != 'PRI'){
                    if(column_array['Unsigned'] != TRUE){
                        $validation[] = strlen($validation) > 0 ? '|':'';
                        $validation[] = 'numeric|';
                        if($exact_length == FALSE){
                            $validation[] = 'digits_between:2,' . $column_array['Length'];
                        } else{                            
                            $validation[] = 'digits:' . $exact_length;
                        }                        
                        return array($name => array($validation, $default));
                   } else{
                        //foreign key figure that out
                   }                    
                } else{
                    return FALSE;
                }
            break;

            case 'tinyint':
                $validation[] = strlen($validation) > 0 ? '|':'';
                $validation[] = 'numeric|';
                $validation[] = 'digits:1';                      
                return array($name => array($validation, $default));
            break;

            case 'varchar':
                $validation[] = strlen($validation) > 0 ? '|':'';
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
                $validation[] = strlen($validation) > 0 ? '|':'';
                |date|date_format:Y-m-d
            break;

            case 'time':
                $validation[] = strlen($validation) > 0 ? '|':'';
                |date_format:Y-m-d
            break;

            case 'datetime':
                $validation[] = strlen($validation) > 0 ? '|':'';
                |date|date_format:Y-m-d H:i:s
            break;

            case 'decimal':
                $validation[] = strlen($validation) > 0 ? '|':'';
                'regex:^\d{1,2}($|\.\d{1,2}$)^'
            break;

            default:
            break;
        }
    }

}