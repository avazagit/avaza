<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staffs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('employee_id')->unsigned()->index()->nullable();
			$table->foreign('employee_id')->references('id')->on('employees');
			$table->integer('supervisor_id')->unsigned()->index()->nullable();
			$table->foreign('supervisor_id')->references('id')->on('employees');
			$table->integer('interpreter_id')->unsigned()->index()->nullable();
			$table->foreign('interpreter_id')->references('id')->on('interpreters');
			$table->integer('extension')->nullable();
			$table->integer('primary_phone');
			$table->integer('secondary_phone')->nullable();
			$table->string('city', 50);
			$table->string('state', 2);
			$table->string('time_zone');
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
		Schema::drop('staffs');
	}

}
