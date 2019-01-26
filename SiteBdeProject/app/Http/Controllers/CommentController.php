<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Intervention\Image\Facades\image;

class commentController extends Controller
{
   public function store(){
   	$this->validate(request(),[
			
			'comment'=>'required',
			'imageid'=>'int|required',

		]);

   	DB::connection('BDDlocal')->insert("call newComment('".addslashes(request()->comment)."','".auth()->user()->id."','".request()->imageid."');");
   	
   	return back();
   }
}
