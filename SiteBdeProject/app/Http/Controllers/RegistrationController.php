<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\User;

class RegistrationController extends Controller
{
    
	Public function create()
	{

		return view('registration.create');


	}

	public function store(){

		//verifie que le contenu des champs est valide
		$this->validate(request(),[
			'name'=>'required',
			'surname'=>'required',
			'email'=>'required|email',
			'password'=>'min:6',
			'role'=>'required',
			'centre'=>'required'
		]); 
		
		//écrit dans la table "utilisateurs"
		
        
        

 	$user = User::create(request(['name','surname', 'email', 'password','role','centre']));
        
        auth()->login($user);
        
        return redirect()->to('/');



	}





}
