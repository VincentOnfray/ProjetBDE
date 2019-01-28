<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Intervention\Image\Facades\image;

class imageController extends Controller
{
    public function store(){

    	$this->validate(request(),[
			
			'image'=>'required|image',
			'eventid'=>'int|required',

		]); 



    		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
      
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\userpost\\').$filename;
    	Image::make($image)->save($folder);
    	//On créé l'image de l'évenement
    	DB::connection('BDDlocal')->insert("call newImage('".$filename."','".auth()->user()->id."','".request()->eventid."');");


    	return back();
    }

    public function like(){
        $this->validate(request(),[
            
            'imageid'=>'required',
            
                    ]); 

         DB::connection('BDDlocal')->insert("call `like`('".request()->imageid."');");

        DB::connection('BDDlocal')->insert("call liked('".request()->imageid."','".auth()->user()->id."');");

        return redirect()->to('/display_event');
    }

    public function delete(){
        $this->validate(request(),[
            
            'imageid'=>'required',
                    ]);
         DB::connection('BDDlocal')->insert("call deleteImage('".request()->imageid."');");


         return redirect()->to('/display_event');
    }   
}
