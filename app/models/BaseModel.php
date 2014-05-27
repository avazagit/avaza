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
        $column_detail = array('Field', 'Type', 'Null', 'Default', 'Extra', 'Key', 'Length', 'Unsigned');
        foreach(DB::select($query) as $column){
            $type_split = explode('(', $column->$column_detail['1']);
            $column->$column_detail['1'] = $type_split['0'];
            $length_split = isset($type_split['1']) ? explode(') ', $type_split['1']):array('');
            $column_length = $length_split['0'];
            $column_setting = isset($length_split['1']) ? TRUE:FALSE;
            $columns[] = array(
                $column->$column_detail['0'] => array(
                    $column_detail['1'] => $column->$column_detail['1'],
                    $column_detail['2'] => $column->$column_detail['2'],
                    $column_detail['3'] => $column->$column_detail['3'],
                    $column_detail['4'] => $column->$column_detail['4'],
                    $column_detail['5'] => $column->$column_detail['5'],
                    $column_detail['6'] => $column_length,
                    $column_detail['7'] => $column_setting
                )
            );
        }
        return $columns;
    }

    public static function getValidationByColumn($column_array){
        $required = $column_array['Null'] == 'YES' ? 'required':'';
        $length   = $column_array['Length'];
        $default  = $column_array['Default'];


        switch ($column_array['Type']){
            case 'int':
                

                $return_array = array();
            break;

            case 'tinyint':
            break;

            case 'varchar':
            break;
 
            case 'text':
            break;

            case 'date':
            break;

            case 'time':
            break;

            case 'datetime':
            break;

            case 'decimal':
            break;

            case 'timestamp':
            break;

            default:
            break;
        }
    }

}