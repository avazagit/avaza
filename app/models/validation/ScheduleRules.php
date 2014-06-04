<?php

class ScheduleRules extends BaseRules{

	public static $rules = [
	  //'id'
	  //'schedulable_id'
	  //'schedulable_type'
		'language_id' => 'required|exists:languages',// foreign index
		'date' => 'required|date|date_format:Y-m-d',
		'start' => 'required|date|date_format:H:i:s',
		'differential' => array('required', 'regex:^\d{1,2}($|\.\d{1,2}$)'),
		'event_json' => 'required',    //[duration_hours: 8, break1 : '2000-03-03 00:01:30', 'lunch' : '2000-03-03 00:02:30', 'break2' : '2000-03-03 00:03:30']
		'recurrence_json' => 'required'//[recur: FALSE, interval_seconds: 0, month_of_year: 0, week_of_month: 0, week_of_year: 0, day_of_week: 0, day_of_month: 0, hour_of_day: 0, minute_of_hour: 0];
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];
	
}