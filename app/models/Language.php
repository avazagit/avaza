<?php

class Language extends BaseModel{

	public function interpreters(){
        return $this->belongsToMany('Interpreter');
    }

    public function clients(){
        return $this->belongsToMany('Client');
    }

    public function schedules(){
        return $this->hasMany('Schedule');
    }

	public static $rules = count($rules) > 0 ? $rules:$this->setInfo('rules');
	public static $fields = count($fields) > 0 ? $fields:$this->setInfo('fields');

	protected $table = 'languages';
	protected $guarded = array('id', 'deleted_at', 'created_at', 'updated_at', 'alternate_languages_json');
	protected $softDelete = true;
    protected $special_fields = array('language_code' => array('exact' => 3));

	protected function setInfo($purpose){
			$columns_details = Languages::getFormFields($table, $special_fields);
			$rules = array();
			$fields = array();
			foreach($columns_details as $column_name => $column_detail){
				$rules[] = $column_name => $column_detail['validators'];
				$fields[] = $column_name => array($column_detail['field_type'], $column_detail['default_value']);
			}
			return $$purpose;
		}
	}
}