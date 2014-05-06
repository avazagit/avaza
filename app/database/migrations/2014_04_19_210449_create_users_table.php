<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email', 50)->unique();
			$table->string('password', 40);
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->boolean('activated')->default(0);
			$table->string('activation_code')->nullable();
			$table->dateTime('activated_at')->nullable();
			$table->dateTime('last_login')->nullable();
			$table->string('reset_password_code')->nullable();
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
		Schema::drop('users');
	}

}
