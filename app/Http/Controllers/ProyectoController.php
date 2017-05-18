<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

use \App\Planos;
use \App\Componentes;
use App\Proyectos;


class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Responsed
     */
    public function store(Request $request)
    {
        include 'GeneradorPassword.php';
        $random_nombre = implode($password);

        $file = $random_nombre . ".json";
        $url = "D:/Carlos/4_Ingenieria_Informatica/2_TRIMESTRE/INF-PGPI/StormEnginering/VSRAD-Codigo/VSRAD3.0/public/json/";
        $texto = $request->configuracion;
        $fp = fopen($url . $file, "w");
        fwrite($fp, $texto);
        fclose($fp);

        $this->validate($request, [
            'nombre' => 'required|min:5|max:20',
            'configuracion' => 'required'
        ]);

        $proyecto = new Proyectos();
        $proyecto->id_cliente = \Auth::user()->id;
        $proyecto->id_tecnico = 0;
        $proyecto->id_comercial = \Auth::user()->id_comercial;
        $proyecto->nombre = $request->nombre;
        $proyecto->configuracion = $file;
        $proyecto->estado = 0;
        $json = json_decode($texto, false, 512);
        $resultado = 0;
        foreach ($json->nodeDataArray as $node) {
            $precio = $node->precio;
            $resultado = $resultado + $precio;
        }
        $proyecto->precio = $resultado;
        $proyecto->class_plano = $request->plano;
        $proyecto->class_casa = $request->casa;
        $proyecto->save();
        //$request->session()->flash('alert-success', 'Proyecto creado con éxito.');
        return redirect('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Proyectos::destroy($id);


        // redirect
        //$request->session()->flash('alert-success', 'Pauta eliminada con exito');
        return redirect('home');
    }




    /*
        public function cambiarestado3(Request $request, $id)
        {
            $proyecto = Proyectos::FindorFail($id);
            $proyecto->estado = '3';
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


        public function cambiarestado5(Request $request, $id)
        {
            $proyecto = Proyectos::FindorFail($id);
            $proyecto->estado = '5';
            $proyecto->save();
            $componentes = Componentes::all();
            $planos = Planos::all();
            return view('cliente.index')->with(['planos' => $planos,'componentes' => $componentes]);
        }*/

    public function peticionpresupuesto(Request $request)
    {

        include 'GeneradorPassword.php';
        $random_nombre = implode($password);

        $file = $random_nombre . ".json";
        $url = "D:/Carlos/4_Ingenieria_Informatica/2_TRIMESTRE/INF-PGPI/StormEnginering/VSRAD-Codigo/VSRAD3.0/public/json/";
        $texto = $request->configuracion;
        $fp = fopen($url . $file, "w");
        fwrite($fp, $texto);
        fclose($fp);

        $this->validate($request, [
            'nombre' => 'required|min:5|max:20',
            'configuracion' => 'required'
        ]);

        $proyecto = new Proyectos();
        $proyecto->id_cliente = 0;
        $proyecto->id_tecnico = 0;
        $proyecto->id_comercial = 0;
        $proyecto->nombre = $request->nombre;
        $proyecto->configuracion = $file;
        $proyecto->estado = 0;
        $json = json_decode($texto, false, 512);
        $resultado = 0;
        foreach ($json->nodeDataArray as $node) {
            $precio = $node->precio;
            $resultado = $resultado + $precio;
        }
        $proyecto->precio = $resultado;
        $proyecto->class_plano = $request->plano;
        $proyecto->class_casa = $request->casa;
        $proyecto->save();
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('cliente.index')->with(['presupuesto' => $resultado,'componentes' => $componentes,'planos'=>$planos]);
    }

    public function visualizarproyectos(Request $request, $id)
    {   $users = User::FindorFail($id);
        $proyectos = Proyectos::all();
        return view('cliente.proyectoscliente')->with(['proyectos' => $proyectos,'users' =>$users]);
    }

    public function asignaciondeproyectostecnico(Request $request, $id)
    {   $users = User::FindorFail($id);
        $proyectos = Proyectos::all();
        return view('tecnico.proyectos')->with(['proyectos' => $proyectos,'users' =>$users]);
    }


    public function validacionproyecto(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $componentes = Componentes::all();
        $users = User::all();
        return view('tecnico.modproyectos')->with(['componentes'=>$componentes,'users' => $users, 'proyecto' => $proyecto]);
    }

    public function validacionproyectocliente(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $componentes = Componentes::all();
        $users = User::all();
        return view('cliente.modproyectos')->with(['componentes'=>$componentes,'users' => $users, 'proyecto' => $proyecto]);
    }

    /*
    public function cambiarestadotecnico(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '2';
        $proyecto->save();
        $users = User::FindorFail($id);
        $proyectos = Proyectos::all();
        return view('tecnico.proyectos')->with(['proyectos' => $proyectos,'users' =>$users]);
    }*/

}
