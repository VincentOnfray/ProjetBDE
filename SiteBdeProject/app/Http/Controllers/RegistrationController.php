<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\User;


class RegistrationController extends Controller
{
    //initie le formulaire
	Public function create()
	{

		return view('registration.create');


	}


													//Verifie l'intégrité des données puis les inscrit dans la BDD et log l'utilisateur in
													public function store(){

														//verifie que le contenu des champs est valide
														$this->validate(request(),[
															'name'=>'required|alpha',
															'surname'=>'required|alpha',
															'email'=>'required|email',
															'password'=>	array(	'required',
																			        'min:6',
																			        'max:50',
																			        'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/',
																				 ),
															'role'=>'required',
															'centre'=>'required'
														]); 
														
														
														
												        
												        
												//écrit dans la table "utilisateurs" en chargeant l'objet dans une variable php
												 	$user = User::create(request(['name','surname', 'email', 'password','role','centre']));
												        
												        //authentifie l'utilisateur
												        auth()->login($user);
												        
												        //retour à l'accueil
												        return redirect()->to('/');



											}


		


}
