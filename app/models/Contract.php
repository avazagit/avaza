<?php

class Contract extends Elegant{

	public function agencies(){
        return $this->hasMany('Agency');
    }

    public function divisions(){
        return $this->hasManyThrough('Division', 'Agency');
    }

    public function languages(){
        return $this->belongsToMany('Language');
    }

    public function manager(){
        return $this->belongsTo('Employee', 'id', 'manager_id');
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'active' => ,
		'manager_id' => ,
		'name' => ,
		'account_number' => ,
		'contract_number' => ,
		'current_purchase_order_number' => ,
		'purchase_order_numbers_json' => ,
		'start_date' => ,
		'end_date' => ,
		'ah_start' => ,
		'ah_end' => ,
		'ah_weekends' => ,
		'otp' => ,
		'otp_1_min', 2, 2 => ,
		'otp_2_min', 2, 2 => ,
		'otp_3_min', 2, 2 => ,
		'otp_4_min', 2, 2 => ,
		'otp_co' => ,
		'otp_co_min', 2, 2 => ,
		'otp_ahup' => ,
		'otp_ahup_min', 2, 2 => ,
		'ons' => ,
		'ons_1_hour' => ,
		'ons_2_hour' => ,
		'ons_3_hour' => ,
		'ons_4_hour' => ,
		'ons_ahup' => ,
		'ons_ahup_hour' => ,
		'ons_rush' => ,
		'ons_rush_fee' => ,
		'ons_rush_window' => ,
		'ons_cancel' => ,
		'ons_cancel_fee' => ,
		'ons_cancel_window' => ,
		'vri' => ,
		'vri_1_min' => ,
		'vri_2_min' => ,
		'vri_3_min' => ,
		'vri_4_min' => ,
		'vri_odup' => ,
		'vri_odup_min', 2, 2 => ,
		'vri_od_window' => ,
		'vri_ahup' => ,
		'vri_ahup_min', 2, 2 => ,
		'vri_schedule' => ,
		'vri_schedule_fee', 2, 2 => ,
		'vri_schedule_cancel' => ,
		'vri_schedule_cancel_fee', 2, 2 => ,
		'vri_schedule_cancel_window' => ,
		'tsl' => ,
		'tsl_1_word', 2, 2 => ,
		'tsl_2_word', 2, 2 => ,
		'tsl_3_word', 2, 2 => ,
		'tsl_4_word', 2, 2 => ,
		'tsl_1_document' => ,
		'tsl_2_document' => ,
		'tsl_3_document' => ,
		'tsl_4_document' => ,
		'tsl_format' => ,
		'tsl_format_page' => ,
		'tsl_rush' => ,
		'tsl_rush_fee' => ,
		'tsl_rush_window' => ,
		'tsl_cancel' => ,
		'tsl_cancel_fee' => ,
		'tsl_cancel_window' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}