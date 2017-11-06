<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsManageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('shops_management')) {
            Schema::create('shops_management', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->string('name');
                $table->string('slug');
                $table->string('active');
                $table->longText('description');
                $table->string('logo');
                $table->string('banner');
                $table->string('featured_shop');
                $table->integer('country_id')->unsigned();
                $table->integer('state_id')->unsigned();
                $table->string('phone');
                $table->string('address');
                $table->string('city');
                $table->string('postcode');
                $table->longText('payment_policy');
                $table->longText('delivery_policy');
                $table->longText('refund_policy');
                $table->longText('additional_information');
                $table->longText('seller_information');
                $table->string('meta_tag_title');
                $table->string('meta_tag_keywords');
                $table->longText('meta_tag_description');

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
        Schema::dropIfExists('shops_management');
    }
}
