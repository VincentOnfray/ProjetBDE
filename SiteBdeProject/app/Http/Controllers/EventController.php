<?php

namespace App\Http\Controllers;

  
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Storage;
use \Intervention\Image\Facades\image;
use App\Event;




class EventController extends Controller
{


    //initie le formulaire
	Public function create()
	{

		if(!(auth()->check())){
			return redirect()->to('/login');
		}

		return view('event.create');


	}

	Public function display()
	{
		if(!(auth()->check())){
			return redirect()->to('/login');
		}
		

		$events = DB::connection('BDDlocal')->Select("SELECT * FROM evenement ORDER BY id ");
		
		

		foreach ($events as $event) {



			//recup des inscrits et création du fichier.csv
			$inscrits = DB::connection('BDDlocal')->select("call getSubID('".$event->id."');");
			$fileContent = $event->titre."; ";
			$count = 0;

			foreach ($inscrits as $inscrit) {
				$info = DB::connection('BDDnat')->select("call getUser('".$inscrit->IDInscrit."');");
				$fileContent = $fileContent . $info[0]->name.",".$info[0]->surname."; ";
				$count++;
			}
				$fileContent = $fileContent . $count.";";
			Storage::disk('inscriptions')->put('inscription'.$event->id.'.txt', $fileContent);
			


			
		$image = DB::connection('BDDlocal')->select("call getImage('".$event->IDImage."');");
        $imgloc = 'img\\userpost\\'.$image[0]->image;
        $event->IDImage = $imgloc;

        $insc =  count(DB::connection('BDDlocal')->select("call checkInsc('".$event->id."','".auth()->user()->id."');"));
        $event->insc = $insc;
        $event->images =  DB::connection('BDDlocal')->Select("call getImages('".$event->id."');");

	       foreach ($event->images as $image) {
				$user = DB::connection('BDDnat')->select("call getUser('".$image->IDCreateur."');");

		       	$image->creator =$user[0]->name." ".$user[0]->surname;


		       	$image->hasLiked = count(DB::connection('BDDlocal')->select("call checklike('".$image->id."','".auth()->user()->id."');"));
		       	
		       	$image->comments =  DB::connection('BDDlocal')->Select("call getComments('".$image->id."');");

		       	foreach ($image->comments as $comment) {

		       		$user = DB::connection('BDDnat')->select("call getUser('".$comment->IDCreateur."');");
		       		$comment->creator =$user[0]->name." ".$user[0]->surname;
		       	}


       }








		}
	

		 return view('event.display')->withEvents($events);


	}



	//Verifie l'intégrité des données puis les inscrit dans la BDD 
	public function store(){

		//verifie que le contenu des champs est valide
		$this->validate(request(),[
			'titre'=>'required',
			'description'=>'max:250',
			'date'=>'date|required',
			'recurrence'=>'',
			'nbrecurrence'=>'',
			'prix'=>'integer|min:0',
			'image'=>'required|image',

		]); 
		
		
		//on enregistre l'image à l'aide de intervention.io 
    	$image = request()->file('image');
    	$filename = time().".".$image->getClientOriginalExtension();
    	$folder = public_path('img\\userpost\\').$filename;
    	Image::make($image)->save($folder);


    	//On créé l'image d'illustration de l'évenement, puis on la récupère pour pouvoir utiliser son ID en créant l'évenement.
    	DB::connection('BDDlocal')->insert("call newImage('".$filename."','".auth()->user()->id."','0');");


    	 

  		$imageID = DB::connection('BDDlocal')->select("call getLastImage();");

  		


       //créer objet Event

        DB::connection('BDDlocal')->insert("call newEvent('".addslashes(request()->titre)."','".addslashes(request()->description)."','".request()->date."','".request()->recurrence."','".request()->prix."','".$imageID[0]->id."');");





         	//en cas de récurrence de l'évenement, on créé autant d'évenements que souhaité à interval régulier, selon la fréquence        à finir 
			switch(request()->recurrence)
			{
			    case 'weekly';
			    break;
			    case 'monthly';
			    break;
			    default;
			    break;
			}
				 return redirect()->to('/display_event');
		}




	public function delete(){ //efface un event de la BDD
    	$this->validate(request(),[
			'eventid'=>'int|required',

		]);

    	DB::connection('BDDlocal')->delete("call deleteEvent('".request()->eventid."');");

    	 return redirect()->to('/display_event');
    }

    public function signUp(){ 
    	$this->validate(request(),[
			'eventid'=>'int|required',

		]);
		DB::connection('BDDlocal')->insert("call signUp('".request()->eventid."','".auth()->user()->id."');");

		 return redirect()->back();


    }

}?>