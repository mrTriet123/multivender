<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Mail;

use App\ContactMessage;
use App\ReplyContact;

class ContactMessagesController extends Controller
{
    //
    public function show(){

    	$contact_messages = ContactMessage::all();

    	return view('admin.contact-messages.index',compact('contact_messages'));
    }

    public function view($id){

    	$contact_message = ContactMessage::findOrFail($id);
    	$reply_contact = ReplyContact::where('id',$contact_message->id)->first();

    	return view('admin.contact-messages.show',compact('contact_message','reply_contact'));
    }

    public function delete($id){
    	$contact_message = ContactMessage::findOrFail($id);
    	$reply_contact = ReplyContact::where('id',$contact_message->id)->first();

    	$reply_contact->delete();
    	$contact_message->delete();

    	return view('admin.contact-messages.index');
    	
    }

    public function getReply($id) {

    	$contact_message = ContactMessage::findOrFail($id);
    	
    	return view('admin.contact-messages.reply',compact('contact_message'));
    }

    public function postReply(Request $request,$id) {

    	$rules = [
    		'content' => 'required'
    	];

    	$validator = Validator::make($request->all(),$rules);

    	if($validator->fails())
    	{
    		return Redirect::back()->withErrors($validator)->withInput();
    	}else{
    		$contact_message = ContactMessage::findOrFail($id);

    		$emailSend = $contact_message->email;
            if (isset($emailSend) && filter_var($emailSend, FILTER_VALIDATE_EMAIL)) {
                 $mail_data = array('name'=>$contact_message->name,'content' => $request['content']);
                Mail::send('auth.emails.reply_messages',$mail_data , function($message) use ($emailSend){
                    $message->to($emailSend)->subject('Welcome to!');
                });
            }

            $rep_contact = new ReplyContact;

            $rep_contact->contact_message_id = $contact_message->id;
            $rep_contact->content = $request->content;

            $rep_contact->save();

            return redirect('admin/contact_message');
    	}
    }

}
