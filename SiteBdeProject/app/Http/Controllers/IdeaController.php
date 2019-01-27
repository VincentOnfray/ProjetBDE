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



     public function display(){

         $ideas = DB::connection('BDDlocal')->Select("SELECT * FROM proposition ORDER BY likes DESC");
    
  
    foreach ($ideas as $idea){
        $image = DB::connection('BDDlocal')->select("call getImage('".$idea->IDImage."');");
        $imgloc = 'img\\userpost\\'.$image[0]->image;
        $idea->IDImage = $imgloc;
}

            return view('idea.display')->withIdeas($ideas);

    }




    public function store(){
    	$this->validate(request(),[
			'titre'=>'required',
			'description'=>'max:250',
			'image'=>'required|image',

		]); 
		
		
		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\userpost\\').$filename;
    	Image::make($image)->save($folder);



    	//On créé l'image d'illustration de l'idée, puis on la récupère pour pouvoir utiliser son ID en créant l'évenement.
    	DB::connection('BDDlocal')->insert("call newImage('".$filename."','".auth()->user()->id."','0');");

    	$IDimage = DB::connection('BDDlocal')->select("call getLastImage();");

    	DB::connection('BDDlocal')->insert("call newIdea('".addslashes(request()->titre)."','".addslashes(request()->description)."','".auth()->user()->id."','".$IDimage[0]->id."');");
    	 

    	return redirect()->to('/display_idea');

    }


    public function delete(){ //fonction effaçant l'idée
    	$this->validate(request(),[
			'ideaid'=>'int|required',

		]);

    	DB::connection('BDDlocal')->delete("call deleteIdea('".request()->ideaid."');");

    	 return redirect()->to('/display_idea');


    }


    public function support(){

        $this->validate(request(),[

            'ideaid'=>'int|required',

        ]);

        DB::connection('BDDlocal')->insert("call support('".request()->ideaid."');");

        DB::connection('BDDlocal')->insert("call supported('".request()->ideaid."','".auth()->user()->id."');");

        return redirect()->to('/display_idea');
    }









}
