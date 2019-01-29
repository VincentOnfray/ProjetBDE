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
			'name'=>'required',
			'description'=>'required|max:250',
			'category'=>'',
			'price'=>'numeric|required',
			'image'=>'required',
		]); 

		
		
		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\boutique\\').$filename;
    	Image::make($image)->save($folder);

       

        DB::connection('BDDlocal')->insert("call newItem('".addslashes(request()->name)."','".addslashes(request()->description)."','".(request()->price*100)."','".request()->category."','".$filename."');");





        
		 return redirect()->to('/shop/'.request()->category);
		}




	public function delete(){ //efface un event de la BDD
    	$this->validate(request(),[
			'articleid'=>'required',

		]);
    	
    	DB::connection('BDDlocal')->delete("call deleteArticle('".request()->articleid."');");

    	 return back();
    }


    public function choose(){ //efface un event de la BDD
    	$this->validate(request(),[
			'articleid'=>'required',

		]);
    	
    	DB::connection('BDDlocal')->delete("call addToCart('".request()->articleid."','".auth()->user()->id."');");

    	 return back();
    }


    public function emptyCart(){ //efface un event de la BDD
    	
    	
    	DB::connection('BDDlocal')->delete("call emptyCart('".auth()->user()->id."');");

    	 return back();
    }




   }
