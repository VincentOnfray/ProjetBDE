<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
   public function getBoutique(){
   		return view('boutique.home');
   }

      public function getCategorie($n){
   		return view('boutique.categorie'.$n);
   }
}

