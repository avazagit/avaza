<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('division_id')->unsigned()->index();
			$table->foreign('division_id')->references('id')->on('divisions');
			$table->boolean('view_reports')->default(0);
			$table->boolean('leave_feedback')->default(0);
			$table->boolean('phone')->default(1);
			$table->boolean('video')->default(0);
			$table->boolean('on_site')->default(0);
			$table->boolean('translate')->default(0);
			$table->boolean('online_requests')->default(1);
			$table->dateTime('last_request')->nullable();
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
		Schema::drop('clients');
	}

}
