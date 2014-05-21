<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table) {
			$table->increments('id');
		//BASIC PERMISSION DATA
			$table->string('name')->default('Interpreter');
			$table->text('description');
		//VIEW
			$table->boolean('users_view'      )->default(0);
			$table->boolean('permissions_view')->default(0);
			$table->boolean('staffs_view'     )->default(1);
			$table->boolean('clients_view'    )->default(0);
			$table->boolean('languages_view'  )->default(1);
			$table->boolean('contracts_view'  )->default(0);
		//CLIENT PARTIAL ACCESS
			$table->boolean('invoices_view'   )->default(0);//client managers can view.
			$table->boolean('reports_view'    )->default(0);//client managers can view.
			$table->boolean('agencies_view'   )->default(1);//client managers can view.
			$table->boolean('divisions_view'  )->default(1);//client managers can view.
			$table->boolean('schedules_view'  )->default(0);
			$table->boolean('events_view'     )->default(0);
			$table->boolean('calls_view'      )->default(0);//client managers and requesting user can view.
			$table->boolean('sessions_view'   )->default(0);//client managers and requesting user can view.
			$table->boolean('sites_view'      )->default(0);//client managers and requesting user can view.
			$table->boolean('documents_view'  )->default(0);//client managers and requesting user can view.
		//CRUD
			$table->boolean('users_crud'      )->default(0);
			$table->boolean('permissions_crud')->default(0);
			$table->boolean('staffs_crud'     )->default(0);
			$table->boolean('clients_crud'    )->default(0);
			$table->boolean('languages_crud'  )->default(0);
			$table->boolean('calls_crud'      )->default(0);
			$table->boolean('sessions_crud'   )->default(0);
			$table->boolean('sites_crud'      )->default(0);
			$table->boolean('documents_crud'  )->default(0);
			$table->boolean('invoices_crud'   )->default(0);
			$table->boolean('reports_crud'    )->default(0);
			$table->boolean('contracts_crud'  )->default(0);
			$table->boolean('events_crud'     )->default(0);
		//CLIENT PARTIAL ACCESS
			$table->boolean('agencies_crud'   )->default(0);//clients can't delete. all changes need internal approval
			$table->boolean('divisions_crud'  )->default(0);//clients can't delete. all changes need internal approval
			$table->boolean('schedules_crud'  )->default(0);//clients can't delete. all changes need internal approval
		//EXECUTIVES
			$table->boolean('contracts_rates' )->default(0);
			$table->boolean('staffs_rates'    )->default(0);
			$table->softDeletes();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permissions');
	}

}
