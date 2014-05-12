<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->morphs('permissable');
			//administration
			$table->boolean('users_c')->default(0);
			$table->boolean('users_r')->default(1);
			$table->boolean('users_u')->default(0);
			$table->boolean('users_d')->default(0);
			$table->boolean('permissions_c')->default(0);
			$table->boolean('permissions_r')->default(1);
			$table->boolean('permissions_u')->default(0);
			$table->boolean('permissions_d')->default(0);
			//user-roles
			$table->boolean('staffs_c')->default(0);
			$table->boolean('staffs_r')->default(1);
			$table->boolean('staffs_u')->default(0);
			$table->boolean('staffs_d')->default(0);
			$table->boolean('staffs_rates')->default(0);
			$table->boolean('clients_c')->default(0);
			$table->boolean('clients_r')->default(1);
			$table->boolean('clients_u')->default(0);
			$table->boolean('clients_d')->default(0);
			$table->boolean('languages_c')->default(0);
			$table->boolean('languages_r')->default(1);
			$table->boolean('languages_u')->default(0);
			$table->boolean('languages_d')->default(0);
			//service usage data
			$table->boolean('calls_c')->default(0);
			$table->boolean('calls_r')->default(1);
			$table->boolean('calls_u')->default(0);
			$table->boolean('calls_d')->default(0);
			$table->boolean('sessions_c')->default(0);
			$table->boolean('sessions_r')->default(1);
			$table->boolean('sessions_u')->default(0);
			$table->boolean('sessions_d')->default(0);
			$table->boolean('sites_c')->default(0);
			$table->boolean('sites_r')->default(0);
			$table->boolean('sites_u')->default(0);
			$table->boolean('sites_d')->default(0);
			$table->boolean('documents_c')->default(0);
			$table->boolean('documents_r')->default(0);
			$table->boolean('documents_u')->default(0);
			$table->boolean('documents_d')->default(0);
			//reporting
			$table->boolean('invoices_c')->default(0);
			$table->boolean('invoices_r')->default(0);
			$table->boolean('invoices_u')->default(0);
			$table->boolean('invoices_d')->default(0);
			$table->boolean('reports_c')->default(0);
			$table->boolean('reports_r')->default(0);
			$table->boolean('reports_u')->default(0);
			$table->boolean('reports_d')->default(0);
			//client data
			$table->boolean('contracts_c')->default(0);
			$table->boolean('contracts_r')->default(0);
			$table->boolean('contracts_u')->default(0);
			$table->boolean('contracts_d')->default(0);
			$table->boolean('contracts_rates')->default(0);
			$table->boolean('agencies_c')->default(0);
			$table->boolean('agencies_r')->default(1);
			$table->boolean('agencies_u')->default(0);
			$table->boolean('agencies_d')->default(0);
			$table->boolean('divisions_c')->default(0);
			$table->boolean('divisions_r')->default(1);
			$table->boolean('divisions_u')->default(0);
			$table->boolean('divisions_d')->default(0);
			//availability and scheduling
			$table->boolean('schedules_c')->default(0);
			$table->boolean('schedules_r')->default(1);
			$table->boolean('schedules_u')->default(0);
			$table->boolean('schedules_d')->default(0);
			$table->boolean('events_c')->default(0);
			$table->boolean('events_r')->default(1);
			$table->boolean('events_u')->default(0);
			$table->boolean('events_d')->default(0);
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
