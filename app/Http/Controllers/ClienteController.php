<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Componentes;
use App\Planos;
use App\User;
use App\Mensajeria;
use App\Proyectos;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['componentes'=>$componentes,'planos'=>$planos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mensajeatecnico(Request $request){
        $users = User::all();
        return view('')->with(['users'=>$users]);
    }

    public function mensajeacomercial(Request $request){
        $users = User::all();
        return view('mensajeria.clienteComercial')->with(['users'=>$users]);
    }

    public function recibidocliente()
    {
        $users = User::all();
        $mensaje = Mensajeria::all();
        return view('cliente.recibidos')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function respuestacliente(Request $request, $id)
    {
        $mensaje = Mensajeria::FindorFail($id);
        $users = User::all();

        return view('cliente.respuesta')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function enviadoscliente()
    {
        $users = User::all();
        $mensaje = Mensajeria::all();
        return view('cliente.enviados')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function visualizarproyectos(Request $request, $id)
    {   $users = User::FindorFail($id);
        $usuarios = User::all();
        $proyectos = Proyectos::all();
        return view('cliente.proyectosmensajecliente')->with(['proyectos' => $proyectos,'users' =>$users, 'usuarios'=>$usuarios]);
    }

    public function enviarmensajeatecnico(Request $request, $id)
    {
        $proyectos = Proyectos::FindorFail($id);
        $users  = User::all();
        return view('mensajeria.clienteTecnico')->with(['proyectos' => $proyectos, 'users'=>$users ]);
    }

    public function enviarmensajeacomercial(Request $request, $id)
    {
        $user = User::FindorFail($id);
        $users  = User::all();
        return view('mensajeria.clienteComercial')->with(['user' => $user, 'users'=>$users ]);
    }

    public function visualizarmensajerecibidos(Request $request,$id){
        $mensaje = Mensajeria::FindorFail($id);
        $users = User::all();
        return view('cliente.visualizarmensajerecibidos')->with(['mensaje'=>$mensaje,'users'=>$users]);

    }

    public function visualizarmensajeenviados(Request $request,$id){
        $mensaje = Mensajeria::FindorFail($id);
        $users = User::all();
        return view('cliente.visualizarmensajeenviados')->with(['mensaje'=>$mensaje,'users'=>$users]);

    }

    public function cambiarestado(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '1';
        $proyecto->save();
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['planos' => $planos,'componentes' => $componentes]);
    }


    public function cambiarestado2(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '2';
        $proyecto->save();
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['planos' => $planos,'componentes' => $componentes]);
    }

    public function cambiarestado4(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '4';
        $proyecto->save();
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['planos' => $planos,'componentes' => $componentes]);
    }


    public function enviarinforme(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '6';
        $proyecto->save();
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['planos' => $planos,'componentes' => $componentes]);
    }

     public function visualizarpedidos(Request $request, $id)
    {   $user = User::FindorFail($id);
        $proyectos = Proyectos::all();
        $usuarios = User::all();
        return view('cliente.historialPedidos')->with(['proyectos' => $proyectos,'user' =>$user,'usuarios'=>$usuarios]);
    }

    public function comprar(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '8';
        $proyecto->save();
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['planos' => $planos,'componentes' => $componentes]);
    }



}
