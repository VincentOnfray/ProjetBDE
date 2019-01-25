<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Intervention\Image\Facades\image;

class commentController extends Controller
{
   public function store(){
   	$this->validate(request(),[
			
			'comment'=>'required|regex:/^[^\']*$/',
			'imageid'=>'int|required',

		]);

   	DB::connection('BDDlocal')->insert("call newComment('".request()->comment."','".auth()->user()->id."','".request()->imageid."');");

   	return back();
   }
}
