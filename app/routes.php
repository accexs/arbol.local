<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Event::listen('illuminate.query', function($query){var_dump($query);});

Route::get('/', 'EnfController@showLogin');

Route::post('/', 'EnfController@doLogin');

Route::get('logout','EnfController@doLogout');

Route::group(array('before'=>'auth'), function(){
	Route::post('test','InvforController@show');
	Route::resource('arbol', 'ArbolController');

	Route::resource('invfor', 'InvforController');
	Route::post('invfor.edit',['uses' => 'invforController@showarbol', 'as' => 'exportar']);

	Route::resource('parcela', 'ParcelaController');

	Route::resource('bloque', 'BloqueController');

	Route::resource('unidad', 'UnidadController');

	Route::get('/getbloques/{id}',['uses' =>'EnfController@populateBloques', 'as'=>'getbloques']);

	Route::get('/getparcelas/{id}',['uses' =>'EnfController@populateParcelas', 'as'=>'getparcelas']);

	Route::get('/consultar',['uses' => 'consultasController@consultarInv', 'as' => 'consultar']);

	Route::get('/consultar/{con}',['uses' => 'consultasController@doConsulta', 'as' => 'doconsulta']);

	Route::post('/exportar',['uses' => 'consultasController@exportar', 'as' => 'exportar']);

	
	Route::get('/manual', function() {
    		return Response::download('manual/manual.pdf');
		});


	});