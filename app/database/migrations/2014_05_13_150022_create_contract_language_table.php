<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_language', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('contract_id')->unsigned()->index();
			$table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
			$table->integer('language_id')->unsigned()->index();
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
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
		Schema::drop('contract_language');
	}

}
