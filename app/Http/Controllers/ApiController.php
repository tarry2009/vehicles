<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests; 
use Response;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller {
	
	/**
	* respond function for json response.
	* @param array $data
	* @return json
	*/
	public function respond($data, $code=200, $headers = []) {
		header('Content-Type: application/json');
		return Response::json($data, $code, $headers);
	}
	
	/**
	* getting results of an api
	* 
	*  @returning json
	*/      
    public function getData($url = ''){ 
		if (empty($url))
		    return false;
		    
		return json_decode(file_get_contents($url), true);
	}
    
 
}
