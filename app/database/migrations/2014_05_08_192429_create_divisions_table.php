<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('divisions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('active')->default(1);
			$table->integer('agency_id');//foreign key - agencies
			$table->string('name');//critical invoice line detail
			$table->string('access_code');//critical invoice line detail
			$table->string('contact_name');
			$table->integer('contact_phone');
			$table->integer('contact_ext')->nullable();
			$table->integer('contact_fax')->nullable();
			$table->string('contact_email');
			$table->string('street_1');
			$table->string('street_2')->nullable();
			$table->string('building')->nullable();
			$table->string('suite')->nullable();
			$table->string('city');
			$table->string('county')->nullable();
			$table->string('state');
			$table->string('zip');
			$table->string('time_zone');
			$table->text('otp_special_json_string')->nullable();
			$table->text('ons_special_json_string')->nullable();
			$table->text('vri_special_json_string')->nullable();
			$table->text('tsl_special_json_string')->nullable();
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
		Schema::drop('divisions');
	}

}
