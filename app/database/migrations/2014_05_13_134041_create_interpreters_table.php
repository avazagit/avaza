<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInterpretersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interpreters', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('id_number');
			$table->boolean('available_now')->default(1);
			$table->dateTime('interpreter_since');
			$table->boolean('suspended')->default(0);
			$table->string('suspended_reason', 20)->nullable();//quality control, no answer, complaint
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
		Schema::drop('interpreters');
	}

}
