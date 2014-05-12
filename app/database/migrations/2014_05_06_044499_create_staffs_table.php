<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id')->unsigned()->nullable();
			$table->integer('supervisor_id')->unsigned()->nullable();
			$table->integer('interpreter_id')->unsigned()->nullable();			
			$table->integer('extension')->nullable();
			$table->integer('primary_phone');
			$table->integer('secondary_phone')->nullable();
			$table->string('location_city', 50);
			$table->string('location_state', 2);
			$table->string('location_time_zone');
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
		Schema::drop('staffs');
	}

}
