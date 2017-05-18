<?php

namespace App\Http\Controllers;

use App\Proyectos;
use App\User;
use App\Peticiones;
use App\TecnicosEliminados;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('director_comercial.index');
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
    public function peticiones(){
        $peticiones = Peticiones::all();
        return view('director_comercial.peticiones')->with(['peticiones'=>$peticiones]);
    }

    public function asignartecnico(){
        $proyectos = Proyectos::all();
        $usuarios = User::all();
        return view('director_comercial.asignartecnico')->with(['proyectos'=>$proyectos,'usuarios'=>$usuarios]);

    }

    public function asignaciontecnico(Request $request, $id){
        $modproyecto = Proyectos::FindorFail($id);
        $modproyecto->id_tecnico = $request->id_tecnico;
        $modproyecto->save();
        $proyectos = Proyectos::all();
        $usuarios = User::all();
        return view('director_comercial.asignartecnico')->with(['proyectos'=>$proyectos,'usuarios'=>$usuarios]);

    }

    public function asignarcomercial(){
        $usuarios = User::all();
        $comerciales = User::all();
        return view('director_comercial.asignarcomercial')->with(['usuarios'=>$usuarios, 'comerciales'=>$comerciales]);

    }

    public function asignacioncomercial(Request $request, $id){
        $moduser = User::FindorFail($id);
        $moduser->id_comercial = $request->id_comercial;
        $moduser->save();
        $proyectos = Proyectos::all();
        foreach($proyectos as $p){
            if($p->id_cliente == $id){
                $p->id_comercial = $request->id_comercial;
                $p->save();
            }
        }
        $usuarios = User::all();
        $comerciales = User::all();
        return view('director_comercial.asignarcomercial')->with(['usuarios'=>$usuarios, 'comerciales'=>$comerciales]);

    }

    public function visualizartecnicos(){
        $usuarios = User::all();
        $tecnicos = TecnicosEliminados::all();
        return view('director_comercial.visualizartecnicos')->with(['usuarios'=>$usuarios, 'tecnicos'=>$tecnicos]);
    }

    public function preliminartecnico(Request $request,$id){

        $tecnico = User::FindorFail($id);
        $tecnicoeliminado = new TecnicosEliminados();
        $tecnicoeliminado->id = $tecnico->id;
        $tecnicoeliminado->nombre = $tecnico->nombre;
        $tecnicoeliminado->apellidos = $tecnico->apellidos;
        $tecnico->eliminado = 1;
        $tecnico->save();
        $tecnicoeliminado->save();
        $usuarios = User::all();
        $tecnicos = TecnicosEliminados::all();
        return view('director_comercial.visualizartecnicos')->with(['usuarios'=>$usuarios, 'tecnicos'=>$tecnicos]);
    }

    public function peticiones_ofertas(){
        $informes = Proyectos::all();
        $users = User::all();
        return view('director_comercial.informes')->with(['informes'=>$informes,'users'=>$users]);
    }
    public function oferta(Request $request, $id)
    {

        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '7';
        $presupuesto = $proyecto->precio;
        $oferta = $request->oferta;
        $porcentaje = $oferta/100;
        $resultado = $presupuesto-($presupuesto*$porcentaje);
        $proyecto->precio = $resultado;
        $proyecto->save();
        //$request->session()->flash('alert-success', 'Proyecto creado con éxito.');
        return redirect('home');
    }

}
