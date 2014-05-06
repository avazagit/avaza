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
			$table->integer('id_number');
			$table->integer('extension')->nullable();
			$table->integer('primary_phone');
			$table->integer('secondary_phone')->nullable();
			$table->string('location_city');
			$table->string('location_state');
			$table->string('location_time_zone');
			$table->boolean('available_now')->default(1);
			$table->dateTime('interpreter_since');
			$table->boolean('suspended')->default(0);
			$table->string('suspended_reason')->nullable();
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
