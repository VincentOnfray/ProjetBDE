<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Intervention\Image\Facades\image;

class ItemController extends Controller
{
    Public function create()
	{

		if(!(auth()->user()->role=="BDE")){
			return redirect()->to('home');
		}

		return view('boutique.create');


	}

		public function store(){

		//verifie que le contenu des champs est valide
		$this->validate(request(),[
			'image'=>'required|image',
			'name'=>'required',
			'description'=>'required',
			'price'=>'required|int',
			'category'=>'required',

		]); 
		
		
		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\boutique\\').$filename;
    	Image::make($image)->save($folder);


    	


    	 


  		


       //créer objet Event

        DB::connection('BDDlocal')->insert("call newItem('".addslashes(request()->name)."','".addslashes(request()->description)."','".request()->price."','".request()->category."','".$filename."');");





         	//en cas de récurrence de l'évenement, on créé autant d'évenements que souhaité à interval régulier, selon la fréquence        à finir 
			
				 return redirect()->to('/shop');
		}




	public function delete(){ //efface un event de la BDD
    	$this->validate(request(),[
			'eventid'=>'int|required',

		]);

    	DB::connection('BDDlocal')->delete("call deleteEvent('".request()->eventid."');");

    	 return redirect()->to('/display_event');
    }




   }
