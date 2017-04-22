<?php

namespace App\Http\Controllers;

use App\Proyectos;
use Illuminate\Http\Request;
use \App\Planos;
use \App\Componentes;
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyectos::all();
        return view('cliente.proyectos')->with(['proyectos'=>$proyectos]);
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
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'configuracion' => 'required'
        ]);

        $proyecto = new Proyectos();

        $proyecto->nombre = $request->nombre;
        $proyecto->configuracion = $request->configuracion;
        $proyecto->estado = 0;
        $proyecto->precio = 0;

        $proyecto->id_cliente = \Auth::user()->id;
        $proyecto->id_tecnico = 0;
        $proyecto->id_comercial  = 0;
        $proyecto->class_plano  = $request->plano;
        $proyecto->class_casa  = $request->casa;
        $proyecto->save();


        //$request->session()->flash('alert-success', 'Proyecto creado con éxito.');
        return redirect('home');
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
    public function destroy(Request $request, $id)
    {
        Proyectos::destroy($id);


        // redirect
        //$request->session()->flash('alert-success', 'Pauta eliminada con exito');
        return redirect('home');
    }

    public function modificar(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.modproyectos')->with(['componentes'=>$componentes,'planos'=>$planos,'proyecto'=>$proyecto]);
    }
}
