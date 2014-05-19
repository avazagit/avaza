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

	public static $rules = [
		'manager_id' => 'exists:employees',
		'name' => 'required|alpha_dash|digits_between:4,70',
		'account_number' => 'required|unique:contracts|digits:7',
		'contract_number' => 'required|unique:contracts',
		'start_date' => 'required|date|date_format:Y-m-d',
		'end_date' => 'required|date|date_format:Y-m-d',
		'ah_start' => 'required|date|date_format:H:i:s',
		'ah_end' => 'required|date|date_format:H:i:s',
		'otp' => 'required|digits:1',
		'otp_1_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'otp_2_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'otp_3_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'otp_4_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'otp_co' => 'required_if:otp,1|digits:1',
		'otp_co_min' => array('required_if:otp_co,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'otp_ahup' =>'required_if:otp,1|digits:1',
		'otp_ahup_min' => array('required_if:otp_ahup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'ons' => 'required|digits:1',
		'ons_1_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)'),
		'ons_2_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)'),
		'ons_3_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)'),
		'ons_4_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)'),
		'ons_ahup' => 'required_if:ons,1|digits:1',
		'ons_ahup_hour' => array('required_if:ons_ahup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'ons_rush' =>'required_if:ons,1|digits:1',
		'ons_rush_fee' => array('required_if:ons_rush,1', 'regex:^\d{1,3}($|\.\d{1,2}$)'),
		'ons_rush_window' => 'required_if:ons_rush,1|digits_between:1,2',
		'ons_cancel' => 'required_if:ons,1|digits:1',
		'ons_cancel_fee' => array('required_if:ons_cancel,1', 'regex:^\d{1,3}($|\.\d{1,2}$)'),
		'ons_cancel_window' => 'required_if:ons_cancel,1|digits_between:1,2',
		'vri' => 'required|digits:1',
		'vri_1_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_2_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_3_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_4_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_odup' => 'required_if:vri,1|digits:1',
		'vri_odup_min' => array('required_if:vri_odup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_od_window' => 'required_if:vri_odup,1|digits:1',
		'vri_ahup' => 'required_if:vri,1|digits:1',
		'vri_ahup_min' => array('required_if:vri_ahup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_schedule' => 'required_if:vri,1|digits:1',
		'vri_schedule_fee' => array('required_if:vri_schedule,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_schedule_cancel_fee' => array('required_if:vri_schedule,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'vri_schedule_cancel_window' => 'required_if:vri_schedule,1|digits:1',
		'tsl' => 'required|digits:1',
		'tsl_1_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'tsl_2_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'tsl_3_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'tsl_4_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'tsl_1_document' => 'required_if:tsl,1|digits_between:1,3',
		'tsl_2_document' => 'required_if:tsl,1|digits_between:1,3',
		'tsl_3_document' => 'required_if:tsl,1|digits_between:1,3',
		'tsl_4_document' => 'required_if:tsl,1|digits_between:1,3',
		'tsl_format' => 'required_if:tsl,1|digits:1',
		'tsl_format_page' => 'required_if:tsl_format,1|numeric|digits_between:1,2',
		'tsl_rush' => 'required_if:tsl,1|digits:1',
		'tsl_rush_fee' => 'required_if:tsl_rush,1|numeric|digits_between:1,2',
		'tsl_rush_window' => 'required_if:tsl_rush,1|numeric|digits_between:1,2',
		'tsl_cancel' => 'required_if:tsl,1|digits:1',
		'tsl_cancel_fee' => 'required_if:tsl_cancel,1|numeric|digits_between:1,2',
		'tsl_cancel_window' => 'required_if:tsl_cancel,1|numeric|digits_between:1,2'
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}