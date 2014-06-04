<?php

class PermissionRules extends BaseRules{

	public static $rules = [
	  //'id'
		'name' => 'required|alpha_dash',
		'description' => 'required|alpha_dash'// Coule be job title??, Router, Super Admin, Client Manager, Client User etc
	  //'users_view'        // boolean default:0
	  //'permissions_view'  // boolean default:0
	  //'staffs_view'       // boolean default:1
	  //'clients_view'      // boolean default:0
	  //'languages_view'    // boolean default:1
	  //'contracts_view'    // boolean default:0
	  //'invoices_view'     // boolean default:0     //client managers can view.
	  //'reports_view'      // boolean default:0     //client managers can view.
	  //'agencies_view'     // boolean default:1     //client managers can view.
	  //'divisions_view'    // boolean default:1     //client managers can view.
	  //'schedules_view'    // boolean default:0
	  //'events_view'       // boolean default:0
	  //'calls_view'        // boolean default:0     //client managers and requesting user can view.
	  //'sessions_view'     // boolean default:0     //client managers and requesting user can view.
	  //'sites_view'        // boolean default:0     //client managers and requesting user can view.
	  //'documents_view'    // boolean default:0     //client managers and requesting user can view.
	  //'users_crud'        // boolean default:0
	  //'permissions_crud'  // boolean default:0 
	  //'staffs_crud'       // boolean default:0 
	  //'clients_crud'      // boolean default:0 
	  //'languages_crud'    // boolean default:0 
	  //'calls_crud'        // boolean default:0
	  //'sessions_crud'     // boolean default:0
	  //'sites_crud'        // boolean default:0
	  //'documents_crud'    // boolean default:0
	  //'invoices_crud'     // boolean default:0
	  //'reports_crud'      // boolean default:0
	  //'contracts_crud'    // boolean default:0
	  //'events_crud'       // boolean default:0
	  //'agencies_crud'     // boolean default:0     //clients can't delete. all changes need internal approval
	  //'divisions_crud'    // boolean default:0     //clients can't delete. all changes need internal approval
	  //'schedules_crud'    // boolean default:0     //clients can't delete. all changes need internal approval
	  //'contracts_rates'   // boolean default:0
	  //'staffs_rates'      // boolean default:0
	  //'deleted_at'
	  //'created_at'
	  //'updated_at'
	];

}