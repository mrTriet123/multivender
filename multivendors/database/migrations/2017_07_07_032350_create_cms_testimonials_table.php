<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('cms_testimonials')) {
            Schema::create('cms_testimonials', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('location');
                $table->string('image');
                $table->longText('text');
                
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
        Schema::dropIfExists('cms_testimonials');
    }
}
