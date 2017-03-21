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
//Route::get('/registro',['as' => 'registro', 'uses' => 'Auth\RegisterController@register']);
Route::post('/test-mail/{id}', ['as' => 'test-mail', 'uses' => 'HomeController@testMail']);
//Route::get('/test-mail', 'HomeController@testMail');

Route::group(['middleware' => 'role:cliente'], function () {
//        Route::get('/', "ClienteController@index");
    Route::get('/tusmuertos', function(){
        echo "Tus muertos";
    });
    Route::get('/peticion', function(){
        return view('auth.peticion');
    });
});

/*
Route::get('/peticion', function(){
    return view('auth.peticion');
});*/




