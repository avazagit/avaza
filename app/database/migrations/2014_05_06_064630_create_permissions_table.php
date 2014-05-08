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
			//main user table
			$table->boolean('users_read')->default(1);
			$table->boolean('users_update')->default(0);
			$table->boolean('users_create')->default(0);
			$table->boolean('users_delete')->default(0);
			//user-roles
			$table->boolean('interpreters_read')->default(1);
			$table->boolean('interpreters_update')->default(0);
			$table->boolean('interpreters_create')->default(0);
			$table->boolean('interpreters_delete')->default(0);
			$table->boolean('interpreters_rates')->default(0);
			$table->boolean('employees_read')->default(1);
			$table->boolean('employees_update')->default(0);
			$table->boolean('employees_create')->default(0);
			$table->boolean('employees_delete')->default(0);
			$table->boolean('employees_rates')->default(0);
			$table->boolean('clients_read')->default(1);
			$table->boolean('clients_update')->default(0);
			$table->boolean('clients_create')->default(0);
			$table->boolean('clients_delete')->default(0);
			//service usage data
			$table->boolean('calls_read')->default(1);
			$table->boolean('calls_update')->default(0);
			$table->boolean('calls_create')->default(0);
			$table->boolean('calls_delete')->default(0);
			$table->boolean('sessions_read')->default(0);
			$table->boolean('sessions_update')->default(0);
			$table->boolean('sessions_create')->default(0);
			$table->boolean('sessions_delete')->default(0);
			$table->boolean('sites_read')->default(0);
			$table->boolean('sites_update')->default(0);
			$table->boolean('sites_create')->default(0);
			$table->boolean('sites_delete')->default(0);
			$table->boolean('documents_read')->default(0);
			$table->boolean('documents_update')->default(0);
			$table->boolean('documents_create')->default(0);
			$table->boolean('documents_delete')->default(0);
			$table->boolean('invoices_read')->default(0);
			$table->boolean('invoices_update')->default(0);
			$table->boolean('invoices_create')->default(0);
			$table->boolean('invoices_delete')->default(0);
			//administration data
			$table->boolean('languages_read')->default(1);
			$table->boolean('languages_update')->default(0);
			$table->boolean('languages_create')->default(0);
			$table->boolean('languages_delete')->default(0);
			$table->boolean('permissions_read')->default(1);
			$table->boolean('permissions_update')->default(0);
			$table->boolean('permissions_create')->default(0);
			$table->boolean('permissions_delete')->default(0);
			//client data
			$table->boolean('contracts_read')->default(0);
			$table->boolean('contracts_update')->default(0);
			$table->boolean('contracts_create')->default(0);
			$table->boolean('contracts_delete')->default(0);
			$table->boolean('contracts_rates')->default(0);
			$table->boolean('agencies_read')->default(1);
			$table->boolean('agencies_update')->default(0);
			$table->boolean('agencies_create')->default(0);
			$table->boolean('agencies_delete')->default(0);
			$table->boolean('divisions_read')->default(1);
			$table->boolean('divisions_update')->default(0);
			$table->boolean('divisions_create')->default(0);
			$table->boolean('divisions_delete')->default(0);
			//availability and scheduling
			$table->boolean('blocks_read')->default(1);
			$table->boolean('blocks_update')->default(0);
			$table->boolean('blocks_create')->default(0);
			$table->boolean('blocks_delete')->default(0);
			$table->boolean('shifts_read')->default(1);
			$table->boolean('shifts_update')->default(0);
			$table->boolean('shifts_create')->default(0);
			$table->boolean('shifts_delete')->default(0);
			$table->boolean('time_punches_read')->default(1);
			$table->boolean('time_punches_update')->default(0);
			$table->boolean('time_punches_create')->default(0);
			$table->boolean('time_punches_delete')->default(0);
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
