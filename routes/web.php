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

Route::get('/proyectos', function () {
    return \App\Proyecto::all();
});

/*Route::get('/proyectos/{id}', function ($id = null) {
    if(isset($id)){
        $proyecto = \App\Proyecto::FindOrFail($id);

       /* $proyecto = \Auth:getUser() -> proyectos;

        foreach ($proyectos as $proyecto){
            echo $proyecto->nombre;
        }

       $user = Auth::user();
       echo $user->name;
      foreach ($user->proyectos as $proyecto){
          echo $proyecto->nombre;
      }
    return $proyecto ->isValidado();
}else
return \App\Proyecto::all();



});

Route::get('/proyectos', function () {
    return \App\Proyecto::all();
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/proyectos', 'HomeController@index');
