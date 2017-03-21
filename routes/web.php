<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/peticion','PeticionesController');
Route::get('/peticion', function(){
    return view('auth.peticion');
});

Route::resource('/registro','RegistroController');


Route::group(['middleware' => 'role:cliente'], function () {

//        Route::get('/', "ClienteController@index");
});

Route::group(['middleware' => 'role:invitado'], function () {
    Route::post('/registro/{id}', ['as' => 'registro', 'uses' => 'RegistroController@store']);
    /*Route::get('/',function(){
        return view('auth.register');
    });
    Route::get('/',function(){
        echo "Hola mundo";
    });*/
});

Route::group(['middleware' => 'role:director_comercial'], function () {
    Route::post('/test-mail/{id}', ['as' => 'test-mail', 'uses' => 'HomeController@testMail']);
    /*Route::get('/',function(){
        return view('auth.register');
    });*/
});
/*
 Route::get('/',function(){
        echo "Hola mundo";
    });*/



