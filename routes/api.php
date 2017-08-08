<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/ 

 Route::group(['middleware' => ['api','cors'],'prefix' => 'v1'], function () {
//Route::group(['prefix' => 'v1'], function(){
	
		Route::get('events', 'EventController@events');
		Route::get('stands', 'EventController@stands');
		Route::get('test', 'EventController@testx');
	
		
		
		Route::get('test', 'EventController@testx');
		Route::post('test', 'EventController@testx');
		Route::delete('test', 'EventController@testx');
		Route::put('test/{id}', 'EventController@testx');
		Route::put('test', 'EventController@testx');
		 
		//Route::get('search', ['middleware' => 'cors'],'UserController@search');
 
});
