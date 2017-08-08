<?php

namespace Tests\Unit;

use App\Results;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventStandTest extends TestCase
{
	
	
/**
* testing keys of result
* 
*  
*/
	public function testVerifyKeys()
	{
		$results = array();
		$results = $this->getData();
		$this->assertArrayHasKey('data', $results); 
		$this->assertArrayHasKey('total', $results); 
		//$this->assertCount(5, $results['data']);
	}
	
/**
* testing values of result
* 
*  
*/
	public function testHasItemInResults()
    { 
        $results = new Results($this->getData());  
        $this->assertTrue($results->has(1));
    }
    
/**
* getting results of an api
* 
*  @returning array
*/      
    public function getData($url = 'http://localhost/vmap/laravel/public/api/v1/stands?cid=4'){ 
		return json_decode(file_get_contents($url), true);
	}

/**
* curl setup of an api
* 
*  @returning curl response
*/        
     
	 public function curlRequest($url, $data_input,$method='GET', $headerstr = 'Content-Type:application/json'){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array( $headerstr));
		curl_setopt($ch, CURLOPT_USERAGENT, 'testing_get_request');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data_input));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response  = curl_exec($ch);
		 
		curl_close($ch);
		return 	$response;
	}
	
}
