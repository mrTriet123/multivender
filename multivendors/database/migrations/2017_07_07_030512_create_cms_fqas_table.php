<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsFqasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('cms_fqas')) {
            Schema::create('cms_fqas', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('fqa_category_id')->unsigned();
                $table->foreign('fqa_category_id')->references('id')->on('fqa_categories');
                $table->string('question');
                $table->longText('description');
                
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
        Schema::dropIfExists('cms_fqas');
    }
}
