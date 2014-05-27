<?php

class Contract extends BaseModel{

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



    static function getFields(){
        return array(
            'active' => 'checkbox',
			'name' => 'text',
			'account_number' => 'text',
			'contract_number' => 'text',
			'current_purchase_order_number' => 'text',
			'start_date' => 'text',
			'end_date' => 'text',
			'ah_start' => 'text',
			'ah_end' => 'text',
			'ah_weekends' => 'text',
			'otp' => 'checkbox',
			'otp_1_min' => 'text',
			'otp_2_min' => 'text',
			'otp_3_min' => 'text',
			'otp_4_min' => 'text',
			'otp_co' => 'checkbox',
			'otp_co_min' => 'text',
			'otp_ahup' => 'checkbox',
			'otp_ahup_min' => 'text',
			'ons' => 'checkbox',
			'ons_1_hour' => 'text',
			'ons_2_hour' => 'text',
			'ons_3_hour' => 'text',
			'ons_4_hour' => 'text',
			'ons_ahup' => 'checkbox',
			'ons_ahup_hour' => 'text',
			'ons_rush' => 'checkbox',
			'ons_rush_fee' => 'text',
			'ons_rush_window' => 'text',
			'ons_cancel' => 'checkbox',
			'ons_cancel_fee' => 'text',
			'ons_cancel_window' => 'text',
			'vri' => 'checkbox',
			'vri_1_min' => 'text',
			'vri_2_min' => 'text',
			'vri_3_min' => 'text',
			'vri_4_min' => 'text',
			'vri_odup' => 'checkbox',
			'vri_odup_min' => 'text',
			'vri_od_window' => 'text',
			'vri_ahup' => 'checkbox',
			'vri_ahup_min' => 'text',
			'vri_schedule' => 'checkbox',
			'vri_schedule_fee' => 'text',
			'vri_schedule_cancel_fee' => 'text',
			'vri_schedule_cancel_window' => 'text',
			'tsl' => 'checkbox',
			'tsl_1_word' => 'text',
			'tsl_2_word' => 'text',
			'tsl_3_word' => 'text',
			'tsl_4_word' => 'text',
			'tsl_1_document' => 'text',
			'tsl_2_document' => 'text',
			'tsl_3_document' => 'text',
			'tsl_4_document' => 'text',
			'tsl_format' => 'checkbox',
			'tsl_format_page' => 'text',
			'tsl_rush' => 'checkbox',
			'tsl_rush_fee' => 'text',
			'tsl_rush_window' => 'text',
			'tsl_cancel' => 'checkbox',
			'tsl_cancel_fee' => 'text',
			'tsl_cancel_window' => 'text'
        );
    }

	public static $rules = [
	  //'id'
	  //'active'                                                                          // boolean default:TRUE;
		'manager_id' => 'exists:employees',                                               // foreign index
		'name' => 'required|digits_between:4,70',							          // example:"State of Tennessee"
		'account_number' => 'required|unique:contracts|digits_between:6,8',                         // critical invoice header detail   layout:000-000 
		'contract_number' => 'required|unique:contracts',                                 // unique
	  //'current_purchase_order_number'                                                   // null     invoice header detail
	  //'purchase_order_numbers_json'                                                     // null     example:['62013_62014':'PO NUMBER HERE', '62012_62013':'PO NUMBER HERE']
		'start_date' => 'required|date|date_format:Y-m-d',								  // date
		'end_date' => 'required|date|date_format:Y-m-d',								  // date
		'ah_start' => 'required|date_format:H:i:s',								  // time default('20:00:00')
		'ah_end' => 'required|date_format:H:i:s',								      // time default('08:00:00')
	  //'ah_weekends'                                                                     // boolean default:TRUE
	  //'otp'                                                                             // boolean default:TRUE
		'otp_1_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)^'),        // decimal default:0.70
		'otp_2_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)^'),        // decimal default:0.75
		'otp_3_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)^'),        // decimal default:0.80
		'otp_4_min' => array('required_if:otp,1', 'regex:^\d{1,2}($|\.\d{1,2}$)^'),        // decimal default:0.75
		'otp_co' => 'required_if:otp,1',                                                  // boolean default:FALSE
	    'otp_co_min' => array('required_if:otp_co,1', 'regex:^\d{1,2}($|\.\d{1,2}$)^'),    // decimal default:0.15
		'otp_ahup' =>'required_if:otp,1',                                                 // boolean default:FALSE
        'otp_ahup_min' => array('required_if:otp_ahup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)^'),// decimal default:0.20
	  //'ons'                                                                      // boolean default:FALSE
		'ons_1_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)^'),// decimal default:65
		'ons_2_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)^'),// decimal default:70
		'ons_3_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)^'),// decimal default:75
		'ons_4_hour' => array('required_if:ons,1', 'regex:^\d{1,3}($|\.\d{1,2}$)^'),// decimal default:80
		'ons_ahup' => 'required_if:ons,1',                                         // boolean default:FALSE
		'ons_ahup_hour' => 'required_if:ons_ahup,1|numeric',                       // default:20
		'ons_rush' =>'required_if:ons,1',                                          // boolean default:FALSE
		'ons_rush_fee' => 'required_if:ons_rush,1|numeric',                        // default:20
		'ons_rush_window' => 'required_if:ons_rush,1|digits_between:1,2',          // default:24
		'ons_cancel' => 'required_if:ons,1',                                       // boolean default:FALSE
		'ons_cancel_fee' => 'required_if:ons_cancel,1|numeric',                    // default:30
		'ons_cancel_window' => 'required_if:ons_cancel,1|digits_between:1,2',      // default:48
	  //'vri'                                                                                            // boolean default:FALSE
		'vri_1_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),                       // default:2.00
		'vri_2_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),                       // default:2.50
		'vri_3_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),                       // default:3.00
		'vri_4_min' => array('required_if:vri,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),                       // default:3.50
		'vri_odup' => 'required_if:vri,1',                                                               // boolean default:FALSE
		'vri_odup_min' => array('required_if:vri_odup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),               // decimal default:0.25
		'vri_od_window' => 'required_if:vri_odup,1|digits:1',                                            // default:1
		'vri_ahup' => 'required_if:vri,1',                                                               // boolean default:FALSE
		'vri_ahup_min' => array('required_if:vri_ahup,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),               // decimal default:0.50
		'vri_schedule' => 'required_if:vri,1',                                                           // boolean default:FALSE
		'vri_schedule_fee' => array('required_if:vri_schedule,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),       // decimal default:2.00
		'vri_schedule_cancel_fee' => array('required_if:vri_schedule,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'),// decimal default:5.00
		'vri_schedule_cancel_window' => 'required_if:vri_schedule,1|digits:1',                           // default:1
	  //'tsl'                                                                       // boolean default:FALSE
		'tsl_1_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'), // decimal default:0.20
		'tsl_2_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'), // decimal default:0.25
		'tsl_3_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'), // decimal default:0.30
		'tsl_4_word' => array('required_if:tsl,1', 'regex:^\d{1,2}($|\.\d{1,2}$)'), // decimal default:0.35
		'tsl_1_document' => 'required_if:tsl,1|digits_between:1,3',                 // default:40
		'tsl_2_document' => 'required_if:tsl,1|digits_between:1,3',                 // default:45
		'tsl_3_document' => 'required_if:tsl,1|digits_between:1,3',                 // default:50
		'tsl_4_document' => 'required_if:tsl,1|digits_between:1,3',                 // default:55
		'tsl_format' => 'required_if:tsl,1|digits:1',                               // boolean default:FALSE
		'tsl_format_page' => 'required_if:tsl_format,1|numeric|digits_between:1,2', // default:25
		'tsl_rush' => 'required_if:tsl,1|digits:1',                                 // boolean default:FALSE
		'tsl_rush_fee' => 'required_if:tsl_rush,1|numeric|digits_between:1,2',      // default:50
		'tsl_rush_window' => 'required_if:tsl_rush,1|numeric|digits_between:1,2',   // default:72
		'tsl_cancel' => 'required_if:tsl,1|digits:1',                               // boolean default:FALSE
		'tsl_cancel_fee' => 'required_if:tsl_cancel,1|numeric|digits_between:1,2',  // default:25
		'tsl_cancel_window' => 'required_if:tsl_cancel,1|numeric|digits_between:1,2'// default:24
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

	// Don't forget to fill this array
	protected $guarded = array();
	protected $softDelete = true;

	public static function columns(){
		return dd(Contract::getAllColumns('contracts'));
	}
	

}