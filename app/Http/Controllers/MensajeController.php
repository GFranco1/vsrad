<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensajeria;
use App\Componentes;
use App\Planos;




class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mensajeria.index');
    }

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


        $mensaj = new Mensajeria();
        $mensaj->asunto = $request->asunto;
        $mensaj->mensaje = $request->mensaje;
        $mensaj->origen = \Auth::user()->id;
        $mensaj->destino = $request->get('destino');
        $mensaj->leido = 0;
        $mensaj->save();

        $id = \Auth::user()->id;
        $usuario = User::FindorFail($id);
        if($usuario->rol == 1){
            $componentes = Componentes::all();
            $planos = Planos::all();
            return view('home')->with(['componentes'=>$componentes,'planos'=>$planos]);;
        }
        else{
            return view('home');
        }

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








}
