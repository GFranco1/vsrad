<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planos;

class PlanoController extends Controller
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
        $plano = new Planos();
        $plano->nombre = $request->nombre;
        $plano->nombre_class = $request->nombre_class;
        $plano->imagen_plano = $request->imagen_plano;
        $plano->icono_plano = $request->icono_plano;
        $plano->validado = "0";
        $plano->save();
        return redirect('home');
    }

       public function planoForm(Request $request)
    {
        return view('administrador.altaPlano');
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function listar(Request $request)
    {
       $planos = Planos::all();
       return view('director_comercial.mostrarPlanos')->with(['planos'=>$planos]);
    }

    public function update(Request $request, $id)
    {
        $plano = Planos::FindorFail($id);
        $plano->validado='1';
        $plano->save();
        
        return redirect('home');
    }

   public function destroy(Request $request, $id)
    {
        PLanos::destroy($id);
        return redirect('home');
    }
}
