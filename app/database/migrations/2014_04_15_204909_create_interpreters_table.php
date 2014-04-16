<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterpretersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interpreters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('intid');
			$table->integer('primary_phone');
			$table->integer('secondary_phone');
			$table->boolean('on_a_call');
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
		Schema::drop('interpreters');
	}

}
