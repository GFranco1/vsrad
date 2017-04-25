<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mensajeria;
class ComercialController extends Controller
{
    public function recibidocomercial()
    {
        $mensaje = Mensajeria::all();
        return view('comercial.recibidos')->with(['mensaje'=>$mensaje]);
    }

    public function respuestacomercial(Request $request, $id)
    {
        $mensaje = Mensajeria::FindorFail($id);
        $users = User::all();

        return view('comercial.respuesta')->with(['mensaje'=>$mensaje,'users'=>$users]);
    }

    public function enviadoscomercial()
    {
        $mensaje = Mensajeria::all();
        return view('comercial.enviados')->with(['mensaje'=>$mensaje]);
    }
}
