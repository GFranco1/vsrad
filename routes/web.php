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


Route::get('/w',function(){
    return view('welcome');
});
Route::get('/',"ClienteController@index");

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/peticion','PeticionesController');
Route::get('/peticion', function(){
    return view('auth.peticion');
});

Route::resource('/registro','RegistroController');

Route::resource('/proyecto','ProyectoController');

Route::group(['middleware' => 'role:cliente'], function () {
          Route::get('/home',"ClienteController@index");
          Route::get('/proyectos', 'ProyectoController@index');
          Route::get('/modproyectos/{id}',['as' => 'modificar', 'uses' => 'ProyectoController@modificar']);
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
    Route::get('/home', 'HomeController@index');
    Route::post('/test-mail/{id}', ['as' => 'test-mail', 'uses' => 'HomeController@testMail']);
    Route::get('/peticiones', 'DirectorController@index');
    /*Route::get('/',function(){
        return view('auth.register');
    });*/
});
/*
 Route::get('/',function(){
        echo "Hola mundo";
    });*/



