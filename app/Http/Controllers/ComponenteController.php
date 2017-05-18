<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Componentes;

class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $componente = new Componentes();
        $componente->nombre = $request->nombre;
        $componente->descripcion = $request->descripcion;
        $componente->precio = $request->precio;
        $componente->imagen = $request->imagen;
        $componente->validado = "0";
        $componente->save();
        return redirect('home');
    }

    public function componenteForm(Request $request)
    {
        return view('administrador.altaComponente');
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
        $componente = Componentes::FindorFail($id);
        $componente->validado='1';
        $componente->save();
        
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function listar(Request $request)
    {
       $componentes = Componentes::all();
       return view('director_comercial.mostrarComponentes')->with(['componentes'=>$componentes]);
    }

   public function destroy(Request $request, $id)
    {
        Componentes::destroy($id);
        return redirect('home');
    }
}
