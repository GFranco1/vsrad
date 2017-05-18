<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \APP\User;
class RegistroController extends Controller
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
    public function store(Request $request,$id)
    {

        $this->validate($request, [
            'nombre' => 'required|max:15',
            'apellidos' => 'required|max:15',
            'dni' => 'required|min:9|max:9',
            'telefono' => 'required|min:9|max:9',
            'contraseña' => 'required|min:6',

        ]);
        
        User::destroy($id);
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->contraseña = bcrypt($request->contraseña);
        $user->telefono = $request->telefono;
        $user->rol = "1";
        $user->save();
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
    public function update(Request $request, $id, array $data)
    {

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


}
