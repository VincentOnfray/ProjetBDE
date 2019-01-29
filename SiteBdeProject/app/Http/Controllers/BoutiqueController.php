<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class BoutiqueController extends Controller
{


 public function getMain(){


		if(!(auth()->check())){
			return redirect()->to('/login');
		}

  

   		return view('boutique.home');
   }


   public function getBoutique(){


		if(!(auth()->check())){
			return redirect()->to('/login');
		}

   	$shop = DB::connection('BDDlocal')->select("SELECT * FROM article");


          foreach ($shop as $article){
       
        
        
        
        $hasChosen = count( DB::connection('BDDlocal')->select("call checkCart('".$article->id."','".auth()->user()->id."');"));



        $article->chosen = $hasChosen;

        }




   		return view('boutique.vitrine')->withShop($shop);
   }






      public function getCategorie($n,Request $request){


		if(!(auth()->check())){
			return redirect()->to('/login');
		}

   		$shop = DB::connection('BDDlocal')->select("call getshop(?);",[$n]);

         foreach ($shop as $article){
       
        
        
        
        $hasChosen = count( DB::connection('BDDlocal')->select("call checkCart('".$article->id."','".auth()->user()->id."');"));



        $article->chosen = $hasChosen;

        }





   		return view('boutique.vitrine')->withShop($shop);
   }

   




}

