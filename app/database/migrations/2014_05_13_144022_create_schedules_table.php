<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table) {
			$table->increments('id');
			$table->morphs('schedulable');
			$table->integer('language_id')->unsigned()->index();
			$table->date('date');
			$table->time('start');
			$table->decimal('differential', 2, 2);
			$table->text('event_json');//[duration_hours: 8, break1 : '2000-03-03 00:01:30', 'lunch' : '2000-03-03 00:02:30', 'break2' : '2000-03-03 00:03:30']
			$table->text('recurrence_json');//[recur: FALSE, interval_seconds: 0, month_of_year: 0, week_of_month: 0, week_of_year: 0, day_of_week: 0, day_of_month: 0, hour_of_day: 0, minute_of_hour: 0];
			$table->boolean('fulfilled')->default(0);
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
		Schema::drop('schedules');
	}

}
