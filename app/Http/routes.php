<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
    Route::resource('select','PlanillaController@sel');

    Route::get('/', function () {
        return view('Auth\login');
    });

    // Authentication routes...
    Route::resource('auth','Auth\AuthController');
    Route::get('logout','Auth\AuthController@logout');

    //como el home controller no existe se tipea en consola: php artisan make:controller HomeController --plain  , plain se usa para que no genere metodos entro del controlador

    Route::group(['middleware' => 'auth'], function () {//se ponen dentro de un grupo, asi no pueden entrar si no se logean
    
    Route::get('home', [
    'uses' => 'HomeController@index',
    'as' => 'home'
    ]);

    Route::resource('emergency', 'EmergencyController');//dentro del controlador hay metodos, cada metodo llama una vista
    
    Route::resource('excelemergency','ExcelEmergencyController');
    
    Route::resource('user','UserController');
    
    Route::resource('planilla','PlanillaController');
    
    Route::resource('pqr','PqrController');
    Route::resource('excelpqr','ExcelPqrController');
       
    Route::resource('pqrnc','PqrncController');
    Route::resource('excelpqrnc','ExcelPqrncController');

});
