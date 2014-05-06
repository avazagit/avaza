<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterpretersLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interpreters_languages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('interpreter_id');
			$table->integer('language_id');
			$table->boolean('phone')->default(1);
			$table->decimal('phone_rate_minute', 2, 2);
			$table->boolean('video')->default(0);
			$table->decimal('video_rate_minute', 2, 2)->nullable();
			$table->boolean('on_site')->default(0);
			$table->decimal('on_site_rate_hour', 3, 2)->nullable();
			$table->boolean('translate')->default(0);
			$table->decimal('translate_rate_word', 2, 2)->nullable();
			$table->boolean('general')->default(0);
			$table->boolean('medical')->default(0);
			$table->boolean('hearing')->default(0);
			$table->boolean('technical')->default(0);
			$table->boolean('emergency')->default(0);
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
		Schema::drop('interpreters_languages');
	}

}
