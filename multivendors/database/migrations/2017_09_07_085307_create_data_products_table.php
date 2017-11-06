<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('data_products')) {
            Schema::create('data_products', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('product_id')->unsigned();
                $table->string('subtract_stock');
                $table->string('track_inventory');
                $table->string('alert_stock_level');
                $table->string('youtube_video');
                $table->string('date_available');
                $table->string('dimensions');
                $table->string('length_class');
                $table->string('weight');
                $table->string('weight_class');
                $table->integer('sort_order');
                $table->string('featured_product');
                $table->string('enable_COD');
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
        Schema::dropIfExists('data_products');
    }
}
