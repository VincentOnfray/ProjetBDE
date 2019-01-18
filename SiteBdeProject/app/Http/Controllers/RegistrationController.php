<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    
	Public function create()
	{
		return view('registration.create');
	}

	public function store(){
		$this->validate(request(),[
			'name'=>'required',
			'surname'=>'required',
			'mail'=>'required|email',
			'password'=>'min:6',
			'role'=>'required',
			'center'=>'required'
		]); 

		DB::connection('BDDnat')->table('utilisateur')->insert(['Prenom'=>request()->input('name'),'Nom'=>request()->input('surname'),'Mail'=>request()->input('mail'),'MDP'=>request()->input('password'),'Role'=>request()->input('role'),'IDcentre'=>request()->input('center')]);

	}





}
