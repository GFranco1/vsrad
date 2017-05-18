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
Route::get('/',"HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/peticion','PeticionesController');
Route::get('/peticion', function(){
    return view('auth.peticion');
});

Route::resource('/registro','RegistroController');
Route::resource('/mensajeria','MensajeController');
Route::resource('/proyecto','ProyectoController');
Route::resource('/admin','AdminController');
Route::resource('/componente','ComponenteController');
Route::resource('/plano','PlanoController');


Route::get('/pedirpresupuesto',['as'=>'pedirpresupuesto', 'uses'=>'ProyectoController@peticionpresupuesto']);



Route::group(['middleware' => 'role:cliente'], function () {
          Route::get('/proyectoscliente/{id}',['as' => 'proyectoscliente', 'uses' => 'ProyectoController@visualizarproyectos'] );
          Route::get('/visualizarpedidos/{id}',['as' => 'visualizarpedidos', 'uses' => 'ClienteController@visualizarpedidos'] );
          Route::get('/proyectosmensajecliente/{id}',['as' => 'proyectosmensajecliente', 'uses' => 'ClienteController@visualizarproyectos'] );
          Route::get('/enviarmensajeatecnico/{id}',['as' => 'enviarmensajeatecnico', 'uses' => 'ClienteController@enviarmensajeatecnico'] );
          Route::get('/enviarmensajeacomercial/{id}',['as' => 'enviarmensajeacomercial', 'uses' => 'ClienteController@enviarmensajeacomercial'] );
          Route::get('/recibidoscliente',['as' => 'recibidoscliente', 'uses' => 'ClienteController@recibidocliente']);
          Route::get('/respuestacliente/{id}',['as' => 'respuestacliente', 'uses' => 'ClienteController@respuestacliente']);
          Route::get('/enviadoscliente',['as' => 'enviadoscliente', 'uses' => 'ClienteController@enviadoscliente']);
          Route::get('/cambiarestado/{id}',['as' => 'cambiarestado', 'uses' => 'ClienteController@cambiarestado']);
          Route::get('/cambiarestado2cliente/{id}',['as' => 'cambiarestado2cliente', 'uses' => 'ClienteController@cambiarestado2']);
          Route::get('/cambiarestado4cliente/{id}',['as' => 'cambiarestado4cliente', 'uses' => 'ClienteController@cambiarestado4']);
          Route::get('/comprar/{id}',['as' => 'comprar', 'uses' => 'ClienteController@comprar']);
          Route::get('/validacionproyectocliente/{id}',['as' => 'validacionproyectocliente', 'uses' => 'ProyectoController@validacionproyectocliente']);
          Route::get('/visualizarmensajerecibidoscliente/{id}',['as' => 'visualizarmensajerecibidoscliente', 'uses' => 'ClienteController@visualizarmensajerecibidos']);
          Route::get('/visualizarmensajeenviadoscliente/{id}',['as' => 'visualizarmensajeenviadoscliente', 'uses' => 'ClienteController@visualizarmensajeenviados']);
          Route::get('/guardarproyecto/{id}',['as' => 'guardarproyecto', 'uses' => 'ProyectoController@guardarproyecto']);
          Route::get('/enviarinforme/{id}',['as' => 'enviarinforme', 'uses' => 'ClienteController@enviarinforme']);
});

Route::group(['middleware' => 'role:invitado'], function () {
    Route::post('/registro/{id}', ['as' => 'registro', 'uses' => 'RegistroController@store']);

});

Route::group(['middleware' => 'role:director_comercial'], function () {
    Route::post('/test-mail/{id}', ['as' => 'test-mail', 'uses' => 'HomeController@testMail']);
    Route::get('/peticiones', 'DirectorController@peticiones');
    Route::get('/mostrarComponentes','ComponenteController@listar');
    Route::get('/mostrarPlanos','PlanoController@listar');
    Route::get('/asignartecnico','DirectorController@asignartecnico');
    Route::get('/asignaciontecnico/{id}',['as' => 'asignaciontecnico', 'uses' => 'DirectorController@asignaciontecnico']);
    Route::get('/asignarcomercial','DirectorController@asignarcomercial');
    Route::get('/asignacioncomercial/{id}',['as' => 'asignacioncomercial', 'uses' => 'DirectorController@asignacioncomercial']);
    Route::get('/visualizartecnicos','DirectorController@visualizartecnicos');
    Route::get('/preliminartecnico/{id}',['as' => 'preliminartecnico', 'uses' => 'DirectorController@preliminartecnico']);
    Route::get('/peticionoferta','DirectorController@peticiones_ofertas');
    Route::get('/oferta/{id}',['as' => 'oferta', 'uses' => 'DirectorController@oferta']);
});

Route::group(['middleware' => 'role:administrador'], function () {
    Route::get('/formulario','AdminController@formulario');
    Route::post('/altaPersonal',['as' => 'altaPersonal', 'uses' => 'AdminController@alta']);
    Route::get('/mostrarPersonal','AdminController@listar');
    Route::get('/datosPersonal/{id}',['as' => 'datosPersonal', 'uses' => 'AdminController@recogerdatos']);
    Route::get('/actualizardatos/{id}',['as' => 'actualizardatos', 'uses' => 'AdminController@actualizardatos']);
    Route::get('/componenteForm','ComponenteController@componenteForm');
    Route::post('/altaComponente',['as' => 'altaComponente', 'uses' => 'ComponenteController@store']);
    Route::get('/planoForm','PlanoController@planoForm');
    Route::post('/altaPlano',['as' => 'altaPlano', 'uses' => 'PlanoController@store']);
});

Route::group(['middleware' => 'role:tecnico'], function () {
    Route::get('/proyectos/{id}',['as' => 'proyectos', 'uses' => 'ProyectoController@asignaciondeproyectostecnico'] );
    Route::get('/cambiarestado2/{id}',['as' => 'cambiarestado2', 'uses' => 'TecnicoController@cambiarestado2']);
    Route::get('/recibidostecnico',['as' => 'recibidostecnico', 'uses' => 'TecnicoController@recibidotecnico']);
    Route::get('/respuestatecnico/{id}',['as' => 'respuestatecnico', 'uses' => 'TecnicoController@respuestatecnico']);
    Route::get('/enviadostecnico',['as' => 'enviadostecnico', 'uses' => 'TecnicoController@enviadostecnico']);
    Route::get('/visualizarmensajerecibidos/{id}',['as' => 'visualizarmensajerecibidos', 'uses' => 'TecnicoController@visualizarmensajerecibidos']);
    Route::get('/visualizarmensajeenviados/{id}',['as' => 'visualizarmensajeenviados', 'uses' => 'TecnicoController@visualizarmensajeenviados']);
    Route::get('/validacionproyecto/{id}',['as' => 'validacionproyecto', 'uses' => 'ProyectoController@validacionproyecto']);
    //Route::get('/cambiarestadotecnico/{id}',['as' => 'cambiarestadotecnico', 'uses' => 'ProyectoController@cambiarestadotecnico']);
    Route::get('/nuevomapa/{id}',['as' => 'nuevomapa', 'uses' => 'TecnicoController@crearconfiguracion']);
    Route::get('/guardarnuevaconfiguracion',['as' => 'guardarnuevaconfiguracion', 'uses' => 'TecnicoController@guardarnuevaconfiguracion']);
});

Route::group(['middleware' => 'role:comercial'], function () {
    Route::get('/recibidoscomercial',['as' => 'recibidoscomercial', 'uses' => 'ComercialController@recibidocomercial']);
    Route::get('/respuestacomercial/{id}',['as' => 'respuestacomercial', 'uses' => 'ComercialController@respuestacomercial']);
    Route::get('/enviadoscomercial',['as' => 'enviadoscomercial', 'uses' => 'ComercialController@enviadoscomercial']);
    Route::get('/peticionescompra',['as' => 'peticionescompra', 'uses' => 'ComercialController@peticionescompras']);
    Route::get('/visualizarmensajerecibidoscomercial/{id}',['as' => 'visualizarmensajerecibidoscomercial', 'uses' => 'ComercialController@visualizarmensajerecibidos']);
    Route::get('/visualizarmensajeenviadoscomercial/{id}',['as' => 'visualizarmensajeenviadoscomercial', 'uses' => 'ComercialController@visualizarmensajeenviados']);
    Route::get('/cambiarestado5comercial/{id}',['as' => 'cambiarestado5comercial', 'uses' => 'ComercialController@cambiarestado5comercial']);
    Route::get('/imprimirClientes/{id}',['as' => 'imprimirClientes', 'uses' => 'ComercialController@imprimirClientes'] );
    Route::get('/formCliente/{id}',['as' => 'formCliente', 'uses' => 'ComercialController@formCliente'] );
    Route::post('/editarCliente/{id}',['as' => 'editarCliente', 'uses' => 'ComercialController@editarCliente'] );
});




