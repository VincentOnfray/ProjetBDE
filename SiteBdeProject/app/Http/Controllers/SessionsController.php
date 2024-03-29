<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
      public function create()
    {
        return view('sessions.create');
    }
    
    public function store()
    {


    		$this->validate(request(),[
			'email'=>'required|email',
			'password'=>'required|min:6',
		]); 

    		


        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }






    	public function messages()
		{
		    return [
		        'email.email' => 'Email invalide',
		        'password.required'  => 'Mot de passe necessaire',
		        
		    ];
		}

}
