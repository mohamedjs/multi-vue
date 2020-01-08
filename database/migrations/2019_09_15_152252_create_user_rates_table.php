<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rate');
			$table->text('comment', 65535);
			$table->boolean('publish');
			$table->integer('user_id')->unsigned()->index('user_rates_user_id_foreign');
			$table->integer('product_id')->unsigned()->index('user_rates_product_id_foreign');
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
		Schema::drop('user_rates');
	}

}
