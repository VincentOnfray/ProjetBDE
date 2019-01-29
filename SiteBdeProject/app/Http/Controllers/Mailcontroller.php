<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;


class Mailcontroller extends Controller
{
    public function mail()
    {

       
 
        return view('contact.contact');
    }

     public function send()
    {
    	$this->validate(request(),[
			'email'=>'required|email',
			'objet'=>'max:250',
			'message'=>'required',

		]); 

		$data = array(
			'email'=> request()->email,
			'objet'=> request()->objet,
			'content'=> request()->message
		);


       Mail::send('Mail.contact', $data, Function($mail) use ($data){ 
       	$mail->from($data['email']);
       	$mail->to('b.lennon13@yahoo.fr');
       	$mail->subject($data['objet']);

       });
 
        return view('contact.contact');
    }
}
