<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Intervention\Image\Facades\image;

class ideaController extends Controller
{
    public function create(){

    	return view('idea.create');
    }

    public function store(){
    	$this->validate(request(),[
			'titre'=>'required',
			'description'=>'max:250|required',
			'image'=>'required|image',

		]); 
		
		
		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\userpost\\').$filename;
    	Image::make($image)->save($folder);


    	//On créé l'image d'illustration de l'évenement, puis on la récupère pour pouvoir utiliser son ID en créant l'évenement.
    	 DB::connection('BDDlocal')->insert("call newImage('".$filename."','".auth()->user()->id."');");
    	 $IDimage = DB::connection('BDDlocal')->select("call getLastImage();");

    	 DB::connection('BDDlocal')->insert("call newIdea('".request()->titre."','".request()->description."','".auth()->user()->id."','".$IDimage[0]->id."');");
    	 

    	 return redirect()->to('/display_idea');

    }


    public function delete(){
    	$this->validate(request(),[
			'ideaid'=>'int|required',

		]);

    	DB::connection('BDDlocal')->delete("call deleteIdea('".request()->ideaid."');");

    	 return redirect()->to('/display_idea');


    }









}
