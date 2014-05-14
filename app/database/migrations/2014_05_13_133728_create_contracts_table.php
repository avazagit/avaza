<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contracts', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('active')->default(1);
			$table->integer('manager_id')->unsigned()->index()->nullable();
			$table->foreign('manager_id')->references('id')->on('employees');
			$table->string('name');
			$table->integer('account_number');//critical invoice header detail
			$table->string('contract_number');
			$table->string('current_purchase_order_number')->nullable();//critical invoice header detail
			$table->text('purchase_order_numbers_json')->nullable();//['62013_62014':'PO NUMBER HERE', '62012_62013':'PO NUMBER HERE']
			$table->date('start_date');
			$table->date('end_date');
			//TIMEFRAME DETAILS
			$table->time('ah_start')->default('20:00:00');
			$table->time('ah_end')->default('08:00:00');
			$table->boolean('ah_weekends')->default(1);
			//OVER THE PHONE RATES
			$table->boolean('otp')->default(1);
			$table->decimal('otp_1_min', 2, 2)->default(0.70);
			$table->decimal('otp_2_min', 2, 2)->default(0.75);
			$table->decimal('otp_3_min', 2, 2)->default(0.80);
			$table->decimal('otp_4_min', 2, 2)->default(0.75);
			$table->boolean('otp_co')->default(1);
			$table->decimal('otp_co_min', 2, 2)->default(0.15);
			$table->boolean('otp_ahup')->default(1);
			$table->decimal('otp_ahup_min', 2, 2)->default(0.20);
			//ON-SITE RATES
			$table->boolean('ons')->default(0);
			$table->integer('ons_1_hour')->default(65);
			$table->integer('ons_2_hour')->default(70);
			$table->integer('ons_3_hour')->default(75);
			$table->integer('ons_4_hour')->default(80);
			$table->boolean('ons_ahup')->default(1);
			$table->integer('ons_ahup_hour')->default(20);
			$table->boolean('ons_rush')->default(1);
			$table->integer('ons_rush_fee')->default(20);
			$table->integer('ons_rush_window')->default(24);//hours until session
			$table->boolean('ons_cancel')->default(1);
			$table->integer('ons_cancel_fee')->default(30);
			$table->integer('ons_cancel_window')->default(48);//hours until session
			//VRI RATES
			$table->boolean('vri')->default(0);
			$table->decimal('vri_1_min', 2, 2)->default(2.00);
			$table->decimal('vri_2_min', 2, 2)->default(2.50);
			$table->decimal('vri_3_min', 2, 2)->default(3.00);
			$table->decimal('vri_4_min', 2, 2)->default(3.50);
			$table->boolean('vri_odup')->default(1);
			$table->decimal('vri_odup_min', 2, 2)->default(0.25);
			$table->integer('vri_od_window')->default(1);//hours until session
			$table->boolean('vri_ahup')->default(1);
			$table->decimal('vri_ahup_min', 2, 2)->default(0.50);
			$table->boolean('vri_schedule')->default(1);
			$table->decimal('vri_schedule_fee', 2, 2)->default(2.00);
			$table->boolean('vri_schedule_cancel')->default(1);
			$table->decimal('vri_schedule_cancel_fee', 2, 2)->default(5.00);
			$table->integer('vri_schedule_cancel_window')->default(1);//hours until session
			//TRANSLATION RATES
			$table->boolean('tsl')->default(0);
			$table->decimal('tsl_1_word', 2, 2)->default(0.20);
			$table->decimal('tsl_2_word', 2, 2)->default(0.25);
			$table->decimal('tsl_3_word', 2, 2)->default(0.30);
			$table->decimal('tsl_4_word', 2, 2)->default(0.35);
			$table->integer('tsl_1_document')->default(40);
			$table->integer('tsl_2_document')->default(45);
			$table->integer('tsl_3_document')->default(50);
			$table->integer('tsl_4_document')->default(55);
			$table->boolean('tsl_format')->default(1);
			$table->integer('tsl_format_page')->default(25);
			$table->boolean('tsl_rush')->default(1);
			$table->integer('tsl_rush_fee')->default(50);
			$table->integer('tsl_rush_window')->default(72);//hours until deadline
			$table->boolean('tsl_cancel')->default(1);
			$table->integer('tsl_cancel_fee')->default(25);
			$table->integer('tsl_cancel_window')->default(24);//hours from request
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
		Schema::drop('contracts');
	}

}
