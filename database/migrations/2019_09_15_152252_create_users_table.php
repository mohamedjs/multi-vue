<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->string('name', 191)->nullable();
			$table->string('user_name', 191)->nullable();
			$table->string('bod')->nullable();
			$table->string('website')->nullable();
			$table->string('email', 191)->unique();
			$table->string('password', 191);
			$table->string('image', 191)->nullable();
			$table->string('phone', 60)->nullable()->unique();
			$table->string('home_phone', 60)->nullable()->unique();
			$table->integer('status')->nullable()->comment('1-Active 2-Block 3-Deactive')->default('1');
			$table->integer('verified')->nullable()->comment('0-no 1-yes')->default('0');
			$table->integer('gender')->nullable()->comment('1-Male 2-Female');
			$table->integer('user_type')->nullable()->comment('1-SuperAdmin 2-Admin 3-Staff 4-Client');
			$table->string('api_token')->nullable();
			$table->date('expired_token')->nullable();
			$table->string('remember_token', 100)->nullable();
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
