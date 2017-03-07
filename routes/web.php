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
/*
Route::get('/tusmuertos', function(){
   echo "Tus muertos";
});*/

Route::resource('/peticion','PeticionesController');




Route::get('/peticion', function(){
    return view('auth.peticion');
});


