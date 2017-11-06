<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyContact extends Model
{
    //
    protected $table = 'reply_contacts';

    public function contactmessage(){
    	return $this->belongsTo(ContactMessage::class, 'contact_message_id');
    	// return $this->belongsTo('App\ContactMessage');
    }
}
