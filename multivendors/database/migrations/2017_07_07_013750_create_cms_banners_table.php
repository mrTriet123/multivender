<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('cms_banners')) {
            Schema::create('cms_banners', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('type_banner_id')->unsigned();
                $table->foreign('type_banner_id')->references('id')->on('type_banners');
                $table->string('image');
                $table->string('html');
                $table->string('url');
                $table->string('openlink');
                
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
        Schema::dropIfExists('cms_banners');
    }
}
