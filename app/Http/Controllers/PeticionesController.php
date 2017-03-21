<?php

namespace App\Http\Controllers;

use App\Peticiones;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\User;

class PeticionesController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        include 'GeneradorPassword.php';
        $password_temporal = implode($password);
        //dd($request->email);
        $this->validate($request,[
            'email' => 'required|unique:users',
            //'password_temporal'=>'required',
        ]);

        $peticion = new Peticiones();
        $peticion->email = $request->email;
        $peticion->password_temporal = $password_temporal;
        $peticion->rol = "4";

        $peticion->save();

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($password_temporal);

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
    public function destroy(Request $request, $id)
    {
        Peticiones::destroy($id);


        // redirect
        //$request->session()->flash('alert-success', 'Pauta eliminada con exito');
        return redirect('home');
    }
}
