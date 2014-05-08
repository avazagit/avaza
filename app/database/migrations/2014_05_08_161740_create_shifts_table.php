<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shifts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id');
			$table->integer('day_of_week');//sunday = 1, saturday = 7, etc...
			$table->time('begin');
			$table->time('break_1')->nullable();
			$table->time('lunch')->nullable();
			$table->integer('lunch_minutes')->nullable()->default(60);
			$table->time('break_2')->nullable();
			$table->time('end');
			$table->integer('duration')->default(9);//hours
			$table->decimal('shift_differential', 2, 2)->default(0.00);
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
		Schema::drop('shifts');
	}

}
