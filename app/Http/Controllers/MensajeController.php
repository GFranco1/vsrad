<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensajeria;


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

    public function mensajeatecnico(Request $request){
        $users = User::all();
        return view('mensajeria.clienteTecnico')->with(['users'=>$users]);
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

        return view('mensajeria.index');
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


    /*
    public function indiceComercial()
    {
        $users = User::all();
        return view('mensajeria.clienteComercial')->with(['users'=>$users]);
    }

    public function indiceTecnico()
    {
        $users = User::all();
        return view('mensajeria.clienteTecnico')->with(['users'=>$users]);
    }

    public function indiceCliente()
    {
        $users = User::all();
        return view('mensajeria.mensajeACliente')->with(['users'=>$users]);
    }*/

    public function responder(Request $request, $id)
    {
        $mensaje = Mensajeria::FindorFail($id);
        //$mensaje = Mensajeria::all();
        // $users = User::all();
        return view('mensajeria.responderMensaje')->with(['mensaje'=>$mensaje]);
        /*
        $mensaj = new Mensajeria();
        $mensaj->asunto = $request->asunto;
        $mensaj->mensaje = $request->mensaje;
        $mensaj->origen = \Auth::user()->id;
        $mensaj->destino = $request->get('destino');
        $mensaj->save();*/

        //return redirect('home');*/
    }


    /**
    protected function validator(array $data)
    {
    return Validator::make($data, [
    'asunto' => 'required|max:255',
    'mensaje' => 'required|max:255',
    ]);
    }
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
