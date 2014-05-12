<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('contract_id')->unsigned();
			$table->integer('language_id')->unsigned();
			$table->integer('language_set')->default(4);			
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
		Schema::drop('contracts_languages');
	}

}
