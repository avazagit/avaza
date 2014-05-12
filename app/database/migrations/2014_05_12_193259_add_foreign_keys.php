<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->foreign('manager_id')->references('id')->on('employees');
		});

		Schema::table('agencies', function(Blueprint $table)
		{
			$table->foreign('contract_id')->references('id')->on('contracts');
		});

		Schema::table('divisions', function(Blueprint $table)
		{
			$table->foreign('agency_id')->references('id')->on('agencies');
		});

		Schema::table('clients', function(Blueprint $table)
		{
			$table->foreign('division_id')->references('id')->on('divisions');
		});

		Schema::table('staffs', function(Blueprint $table)
		{
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->foreign('supervisor_id')->references('id')->on('employees');
			$table->foreign('interpreter_id')->references('id')->on('interpreters');
		});

		Schema::table('interpreters_languages', function(Blueprint $table)
		{
			$table->foreign('language_id')->references('id')->on('languages');
			$table->foreign('interpreter_id')->references('id')->on('interpreters');
		});

		Schema::table('contracts_languages', function(Blueprint $table)
		{
			$table->foreign('language_id')->references('id')->on('languages');
			$table->foreign('contract_id')->references('id')->on('contracts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contracts', function(Blueprint $table)
		{
			$table->dropForeign('contracts_manager_id_foreign');
		});

		Schema::table('agencies', function(Blueprint $table)
		{
			$table->dropForeign('agencies_contract_id_foreign');
		});

		Schema::table('divisions', function(Blueprint $table)
		{
			$table->dropForeign('divisions_agency_id_foreign');
		});

		Schema::table('clients', function(Blueprint $table)
		{
			$table->dropForeign('clients_division_id_foreign');
		});

		Schema::table('staffs', function(Blueprint $table)
		{
			$table->dropForeign('staffs_employee_id_foreign');
			$table->dropForeign('staffs_supervisor_id_foreign');
			$table->dropForeign('staffs_interpreter_id_foreign');
		});

		Schema::table('interpreters_languages', function(Blueprint $table)
		{
			$table->dropForeign('interpreters_languages_language_id_foreign');
			$table->dropForeign('interpreters_languages_interpreter_id_foreign');
		});
		
		Schema::table('contracts_languages', function(Blueprint $table)
		{
			$table->dropForeign('contracts_languages_language_id_foreign');
			$table->dropForeign('contracts_languages_contract_id_foreign');
		});
	}

}
