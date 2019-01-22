<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    //initie le formulaire
	Public function create()
	{

		return view('registration.create');


	}


	//Verifie l'intégrité des données puis les inscrit dans la BDD 
	public function store(){

		//verifie que le contenu des champs est valide
		$this->validate(request(),[
			
		]); 
		
		
		
        
        
		//écrit dans la table "evenement" 
 		
        
       
        return redirect()->to('/event_display');



	}


		


}
