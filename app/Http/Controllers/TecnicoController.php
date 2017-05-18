<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensajeria;
use App\Componentes;
use App\Planos;
use App\Proyectos;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('tecnico.index');
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

    public function recibidotecnico()
    {
        $users = User::all();
        $mensaje = Mensajeria::all();
        return view('tecnico.recibidos')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function respuestatecnico(Request $request, $id)
    {
        $mensaje = Mensajeria::FindorFail($id);
        $users = User::all();

        return view('tecnico.respuesta')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function enviadostecnico()
    {
        $users = User::all();
        $mensaje = Mensajeria::all();
        return view('tecnico.enviados')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function crearconfiguracion(Request $request,$id){
        $proyecto = Proyectos::FindorFail($id);
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('tecnico.nuevomapa')->with(['componentes'=>$componentes,'planos'=>$planos,'proyecto'=>$proyecto]);
    }

    public function guardarnuevaconfiguracion(Request $request)
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
        $proyecto->id_cliente = $request->id;
        $proyecto->id_tecnico = \Auth::user()->id;;
        $proyecto->id_comercial = 0;
        $proyecto->nombre = $request->nombre;
        $proyecto->configuracion = $file;
        $proyecto->estado = 3;
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
        Proyectos::destroy($request->id_proyecto);
        //$request->session()->flash('alert-success', 'Proyecto creado con éxito.');
        return redirect('home');
    }

    public function visualizarmensajerecibidos(Request $request,$id){
        $mensaje = Mensajeria::FindorFail($id);
        return view('tecnico.visualizarmensajerecibidos')->with(['mensaje'=>$mensaje]);

    }

    public function visualizarmensajeenviados(Request $request,$id){
        $mensaje = Mensajeria::FindorFail($id);
        return view('tecnico.visualizarmensajeenviados')->with(['mensaje'=>$mensaje]);

    }

    public function cambiarestado2(Request $request, $id)
    {
        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '2';
        $proyecto->save();

        return view('home');
    }



}
