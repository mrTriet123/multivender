<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    //
    protected $table = 'contact_messages';

    public function replycontact(){
    	return $this->hasOne('App\ReplyContact');
    }
}
