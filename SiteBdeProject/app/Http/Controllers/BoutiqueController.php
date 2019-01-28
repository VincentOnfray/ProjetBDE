<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class BoutiqueController extends Controller
{
   public function getBoutique(){
   		return view('boutique.home');
   }

      public function getCategorie($n){
   		$shop = DB::connection('BDDlocal')->select("call getGoodies();");

   		return view('boutique.'.$n)->withShop($shop);
   }
}

