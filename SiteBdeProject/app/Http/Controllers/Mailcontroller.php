<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;

class Mailcontroller extends Controller
{
    public function mail(Request $request)
    {

        Mail::send("emails.contact",array(),function($message)
        {
        	
        	$message->to('cesiprojetbde@gmail.com');
        });
 
        return view('confirm');
    }
}
