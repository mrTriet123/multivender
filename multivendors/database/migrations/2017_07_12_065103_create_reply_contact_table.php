<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('reply_contacts')) {
            Schema::create('reply_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('contact_message_id')->unsigned();
                $table->foreign('contact_message_id')->references('id')->on('contact_messages');
                $table->longText('content');
                
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
        Schema::dropIfExists('reply_contacts');
    }
}
