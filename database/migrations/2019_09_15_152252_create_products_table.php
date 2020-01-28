<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->string('main_image', 191);
			$table->decimal('price', 10);
			$table->integer('special_price_type')->nullable()->comment('1-fixed 2-ratio');
			$table->decimal('special_price', 10)->nullable();
			$table->boolean('special')->default(0);
			$table->boolean('active')->default(1);
			$table->LongText('description')->nullable();
			$table->text('short_description', 65535)->nullable();
			$table->date('special_price_start')->nullable();
			$table->date('special_price_end')->nullable();
			$table->string('sku')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_keyword')->nullable();
			$table->text('meta_description')->nullable();
			$table->integer('stock')->default('0');
			$table->integer('min_stock')->default('0');
			$table->integer('seller')->default('0');
			$table->integer('category_id')->unsigned()->index('products_category_id_foreign');
			$table->integer('brand_id')->unsigned()->index('products_brand_id_foreign');
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
		Schema::drop('products');
	}

}
