<?php

class Permission extends Elegant{

	public function users(){
        return $this->hasMany('User');
    }

	public function permissable(){
        return $this->morphTo();
    }

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'permissable' => ,
		'users_c' => ,
		'users_r' => ,
		'users_u' => ,
		'users_d' => ,
		'permissions_c' => ,
		'permissions_r' => ,
		'permissions_u' => ,
		'permissions_d' => ,
		'staffs_c' => ,
		'staffs_r' => ,
		'staffs_u' => ,
		'staffs_d' => ,
		'staffs_rates' => ,
		'clients_c' => ,
		'clients_r' => ,
		'clients_u' => ,
		'clients_d' => ,
		'languages_c' => ,
		'languages_r' => ,
		'languages_u' => ,
		'languages_d' => ,
		'calls_c' => ,
		'calls_r' => ,
		'calls_u' => ,
		'calls_d' => ,
		'sessions_c' => ,
		'sessions_r' => ,
		'sessions_u' => ,
		'sessions_d' => ,
		'sites_c' => ,
		'sites_r' => ,
		'sites_u' => ,
		'sites_d' => ,
		'documents_c' => ,
		'documents_r' => ,
		'documents_u' => ,
		'documents_d' => ,
		'invoices_c' => ,
		'invoices_r' => ,
		'invoices_u' => ,
		'invoices_d' => ,
		'reports_c' => ,
		'reports_r' => ,
		'reports_u' => ,
		'reports_d' => ,
		'contracts_c' => ,
		'contracts_r' => ,
		'contracts_u' => ,
		'contracts_d' => ,
		'contracts_rates' => ,
		'agencies_c' => ,
		'agencies_r' => ,
		'agencies_u' => ,
		'agencies_d' => ,
		'divisions_c' => ,
		'divisions_r' => ,
		'divisions_u' => ,
		'divisions_d' => ,
		'schedules_c' => ,
		'schedules_r' => ,
		'schedules_u' => ,
		'schedules_d' => ,
		'events_c' => ,
		'events_r' => ,
		'events_u' => ,
		'events_d' => ,
	];

	// Don't forget to fill this array
	protected $fillable = array();
	protected $softDelete = true;

}