<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Mail;

class VehicleController  extends ApiController {

 
	/**
	* Construct the base url and files directories.
	*/
    public function __construct(){
        
    }
	
    public function index(Request $request) {
		echo 'yes';
        
    }
    
    public function testx(Request $request) {  
		return 'testing';
	}
	 
	public function vehiclex(Request $request){
		   
        
		$newarray = $nhtsa = array();
		
		if (empty($request->model))
			return $this->respond(array('Error'=>'Model name required'),400); 
			
		if (empty($request->manufacturer))
			return $this->respond(array('Error'=>'Manufacturer name required'),400); 
		 
		if (!empty($request->modelYear) && is_numeric($request->modelYear)){
 
			$url = 'https://one.nhtsa.gov/webapi/api/SafetyRatings/modelyear/'.$request->modelYear.'/make/'.$request->manufacturer.'/model/'.$request->model.'?format=json';
			$nhtsa = $this->getData($url);
			
			
			$newarray['Count'] = $nhtsa['Count']; 
			$newarray['Results'] = [];
			
			if (!empty($nhtsa['Results'])){
				foreach ($nhtsa['Results'] as $i=>$vid){ 
					
					if($request->withRating=='true' ){ 
								
							$crash_rating_url = 'https://one.nhtsa.gov/webapi/api/SafetyRatings/VehicleId/'.$vid['VehicleId'].'?format=json';
							$crash_rating_data = $this->getData($crash_rating_url );
							 
							if (isset($crash_rating_data['Results'][0]['OverallRating'])){ 
								$newarray['Results'][$i]['CrashRating'] = $crash_rating_data['Results'][0]['OverallRating']; 
							} 
								 
					}
					$newarray['Results'][$i]['VehicleId'] = $vid['VehicleId'];
					$newarray['Results'][$i]['Description'] = $vid['VehicleDescription'];
					
				}
			}
				 
			 
			return $this->respond($newarray);
		} else {
			return $this->respond(array('Error'=>'Model Year required'),400);
			 
		}
	 
	}
	   
	  
	/**
	* Send Email. 
	* @return void
	*/
	 public function html_email($data){

		  Mail::send('mail', $data, function($message) {
			 $message->to('ashfaqzp@gmail.com', 'Project Admin')->subject
				('Event Stand Booked');
			 $message->from('noreply@gmail.com','Test');
		  });
		 // echo "Email Sent. Check your inbox.";
	   }
   
        
}
