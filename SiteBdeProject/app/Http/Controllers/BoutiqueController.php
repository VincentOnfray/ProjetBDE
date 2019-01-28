<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class BoutiqueController extends Controller
{
   public function getBoutique(){

   	$shop = DB::connection('BDDlocal')->select("SELECT * FROM article");

   		return view('boutique.home')->withShop($shop);
   }

      public function getCategorie($n,Request $request){
   		$shop = DB::connection('BDDlocal')->select("call getshop(?);",[$n]);
   		return view('boutique.home')->withShop($shop);
   }

   




}

