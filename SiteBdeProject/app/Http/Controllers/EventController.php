<?php

namespace App\Http\Controllers;

  
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use \Illuminate\Support\Facades\Storage;
use \Intervention\Image\Facades\image;
use App\Event;



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
			'image'=>'required|image',

		]); 
		
		
		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\userpost\\').$filename;
    	Image::make($image)->save($folder);


    	//On créé l'image d'illustration de l'évenement, puis on la récupère pour pouvoir utiliser son ID en créant l'évenement.
    	 DB::connection('BDDlocal')->insert("call newImage('".$filename."','".auth()->user()->id."');");


    	 

  		$imageID = DB::connection('BDDlocal')->select("call getLastImage();");


       //créer objet Event

         DB::connection('BDDlocal')->insert("call newEvent('".request()->titre."','".request()->description."','".request()->date."','".request()->recurrence."','".request()->prix."','".$imageID[0]->id."');");





         	//en cas de récurrence de l'évenement, on créé autant d'évenements que souhaité à interval régulier, selon la fréquence        à finir 
			switch(request()->recurrence)
			{
			    case 'weekly';




			    break;
			    case 'monthly';
			    

			    break;
			    default;
			       
			    break;
			}


			
			
			
				
				

				 return redirect()->to('/display_event');

		}

       
       


}


		



?>