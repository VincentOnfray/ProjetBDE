<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use ZipArchive;
use \Illuminate\Support\Facades\DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dl(){
    	if ((auth()->check()) && (auth()->user()->role == "CESI")){
    		



   
    
       
        	$public_dir=public_path()."\\img\\";
        	// Zip File Name
            $zipFileName = 'imgs.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            	// Add File in ZipArchive
            	$imgs = DB::connection('BDDlocal')->select('SELECT * FROM image');

            	foreach ($imgs as $img) {
            	





            	 $zip->addFile(public_path()."\\img\\userpost\\".$img->image,$img->image);
            		
            	}





               
                // Close ZipArchive     
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$public_dir.'/'.$zipFileName;
            // Create Download Response
            
        
      
    






    		return view('dl');
    	}



    	else{
    		return view('home');
    	}

    	
    }
}
