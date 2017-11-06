<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('shop_id')->unsigned();
                $table->string('name');
                $table->string('slug');
                $table->float('price', 10, 2);
                $table->integer('quantity');
                $table->integer('minimum_quantity');
                $table->integer('brand_id')->unsigned();
                $table->integer('category_id')->unsigned();
                $table->string('model');
                $table->string('sku');
                $table->string('condition');
                $table->string('status');
                $table->string('photo');
                $table->longText('description');
                $table->string('tags');

                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('products');
    }
}
