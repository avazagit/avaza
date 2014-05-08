<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('language_id');
			$table->integer('hour_of_day');
			$table->integer('duration_hours');
			$table->integer('interpreter_id')->nullable();
			$table->decimal('rate_bump', 2, 2)->default(0.00);
			$table->boolean('fulfilled')->default(0);
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
		Schema::drop('blocks');
	}

}
