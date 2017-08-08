<?php

namespace Tests\Unit;

use App\Results;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
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
		$this->assertCount(5, $results['data']);
	}
	
/**
* testing values of result
* 
*  
*/
	public function testHasItemInResults()
    { 
        $results = new Results($this->getData()); 
        $this->assertFalse($results->has(9));
        $this->assertTrue($results->has(5));
    }
    
/**
* getting results of an api
* 
*  @returning array
*/      
    public function getData($url = 'http://localhost/vmap/laravel/public/api/v1/events'){ 
		return json_decode(file_get_contents($url), true);
	}
    
    
	//we have to install Guzzle for this test.
	public function testRequestStatus(){
		
		/* 
		// create our http client (Guzzle)
		$client = new Client('http://localhost/seek/laravel/public/', array(
			'request.options' => array(
				'exceptions' => false,
			)
		));

		$data = array(
			'admin' => 'ssk',
			'marketing_file' => '',
			'tagLine' => 'a test dev!'
		);

		$request = $client->post('api/v1/company-create', null, json_encode($data));
		$response = $request->send();
		 
		$this->assertEquals(200, $response->getStatusCode());
		*/
	}
    //for test write command in terminal from root path of project: ./vendor/bin/phpunit
	
	
	
}
