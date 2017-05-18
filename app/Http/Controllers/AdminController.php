<?php

namespace App\Http\Controllers;

use App\TecnicosEliminados;
use Illuminate\Http\Request;
use App\User;
use App\Componentes;
class AdminController extends Controller
{

    public function formulario(Request $request)
    {
        return view('administrador.formPersonal');
    }
    public function alta(Request $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->telefono = $request->telefono;
        $user->rol = $request->rol;
        $user->save();
        return redirect('home');
    }
    public function listar(Request $request)
    {
       $users = User::all();
        $tecnicosocultos = TecnicosEliminados::all();
       return view('administrador.mostrarPersonal')->with(['users'=>$users,'tecnicos'=>$tecnicosocultos]);
    }

    public function recogerdatos(Request $request, $id){
        $users = User::FindorFail($id);
        return view('administrador.datosPersonal')->with(['users'=>$users]);
    }

    public function actualizardatos(Request $request, $id)
    {
        $moduser = User::FindorFail($id);
        $moduser->nombre = $request->nombre;
        $moduser->apellidos = $request->apellidos;
        $moduser->dni = $request->dni;
        $moduser->email = $request->email;
        $moduser->password = $moduser->password;
        $moduser->telefono = $request->telefono;
        $moduser->rol = $request->rol;
        $moduser->save();
        $users = User::all();
        $tecnicosocultos = TecnicosEliminados::all();
        return view('administrador.mostrarPersonal')->with(['users'=>$users, 'tecnicos'=>$tecnicosocultos]);
    }

   public function destroy(Request $request, $id)
    {
        User::destroy($id);
        $users = User::all();
        $tecnicosocultos = TecnicosEliminados::all();

        // redirect
        //$request->session()->flash('alert-success', 'Pauta eliminada con exito');
        return view('administrador.mostrarPersonal')->with(['users'=>$users,'tecnicos'=>$tecnicosocultos]);
    }

}