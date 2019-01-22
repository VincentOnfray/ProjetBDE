<?php

namespace App\Http\Controllers;

  
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use \Illuminate\Support\Facades\Storage;
use \Intervention\Image\Facades\image;



class EventController extends Controller
{



	
    //initie le formulaire
	Public function create()
	{

		return view('event.create');


	}



	//Verifie l'intégrité des données puis les inscrit dans la BDD 
	public function store(){

		//verifie que le contenu des champs est valide
		$this->validate(request(),[
			'titre'=>'required',
			'description'=>'max:250|required',
			'date'=>'date|required',
			'recurrence'=>'',
			'nbrecurrence'=>'',
			'prix'=>'integer|min:0',
			'image'=>'required',

			

		]); 
		
		
		 
        
        Storage::put('test.jpg', request()->file( request()->image));
		//écrit dans la table "evenement" 
 		// DB::connection('BDDlocal')->insert
        
       
        return redirect()->to('/display_event');



	}


		


}
