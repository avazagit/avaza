<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agencies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('active')->default(1);
			$table->integer('contract_id');//foreign key - contracts
			$table->string('name');//critical invoice header detail
			$table->string('client_code');//critical invoice header detail
			$table->string('contact_name');
			$table->integer('contact_phone');
			$table->integer('contact_ext');
			$table->integer('contact_fax')->nullable();
			$table->string('contact_email');
			$table->string('bill_to_1');
			$table->string('bill_to_2')->nullable();
			$table->string('street_1');
			$table->string('street_2')->nullable();
			$table->string('building')->nullable();
			$table->string('suite')->nullable();
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->text('special_invoice_json_string')->nullable();
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
		Schema::drop('agencies');
	}

}