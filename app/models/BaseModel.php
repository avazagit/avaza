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
        $column_detail = array('Field', 'Type', 'Null', 'Default', 'Extra', 'Length', 'Unsigned');
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
                    $column_detail['5'] => $column_length,
                    $column_detail['6'] => $column_setting
                )
            );
        }
        return $columns;
    }

    public static function getValidationByColumn($column_array){
        switch ($column_type){
            case 'pgsql':
                $query = "SELECT column_name FROM information_schema.columns WHERE table_name = '".$this->table."'";
                $column_name = 'column_name';
                $reverse = true;
                break;

            case 'mysql':
                $query = 'SHOW COLUMNS FROM '.$this->table;
                $column_name = 'Field';
                $reverse = false;
                break;

            case 'sqlsrv':
                $parts = explode('.', $this->table);
                $num = (count($parts) - 1);
                $table = $parts[$num];
                $query = "SELECT column_name FROM ".DB::connection()->getConfig('database').".INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."'";
                $column_name = 'column_name';
                $reverse = false;
                break;

            default: 
                $error = 'Database driver not supported: '.DB::connection()->getConfig('driver');
                throw new Exception($error);
                break;
        }
    }

}