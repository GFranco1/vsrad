<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensajeria;
use App\Proyectos;
class ComercialController extends Controller
{
    public function recibidocomercial()
    {
        $users = User::all();
        $mensaje = Mensajeria::all();
        return view('comercial.recibidos')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function respuestacomercial(Request $request, $id)
    {
        $mensaje = Mensajeria::FindorFail($id);
        $users = User::all();
        return view('comercial.respuesta')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function enviadoscomercial()
    {
        $users = User::all();
        $mensaje = Mensajeria::all();
        return view('comercial.enviados')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function visualizarmensajerecibidos(Request $request,$id){
        $mensaje = Mensajeria::FindorFail($id);
        return view('comercial.visualizarmensajerecibidos')->with(['mensaje'=>$mensaje]);

    }

    public function visualizarmensajeenviados(Request $request,$id){
        $mensaje = Mensajeria::FindorFail($id);
        return view('comercial.visualizarmensajeenviados')->with(['mensaje'=>$mensaje]);

    }

    public function peticionescompras(Request $request){
        $peticiones = Proyectos::all();
        $users = User::all();
        return view('comercial.peticionescompra')->with(['peticiones'=>$peticiones,'users'=>$users]);
    }



    public function cambiarestado5comercial(Request $request, $id)
    {

        $proyecto = Proyectos::FindorFail($id);
        $proyecto->estado = '5';
        $presupuesto = $proyecto->precio;
        $IVA = $presupuesto*0.21;
        $mano_de_obra = $presupuesto*10;
        $proyecto->precio = $presupuesto+$IVA+$mano_de_obra;
        $proyecto->save();
        //$request->session()->flash('alert-success', 'Proyecto creado con éxito.');
        return redirect('home');
    }

    public function imprimirClientes(Request $request,$id)
    {
        $user = User::FindorFail($id);
        $users = User::all();
        return view('comercial.gestionClientesAsignados')->with(['users'=>$users,'user'=>$user]);
    }

    public function formCliente(Request $request,$id)
    {
        $user = User::FindorFail($id);
        return view('comercial.formularioEdicion')->with(['user'=>$user]);
    }

     public function editarCliente(Request $request,$id)
    {
        $user = User::FindorFail($id);
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->save();
        return view('/home');
    }

}
