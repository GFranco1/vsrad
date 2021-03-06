<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailChecker;
use App\Mail\TempPass;
use App\Peticiones;
use Mail;
use App\Componentes;
use App\Planos;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $componentes = Componentes::all();
        $planos = Planos::all();
        return view('home')->with(['componentes'=>$componentes,'planos'=>$planos]);
    }

    public function testMail(Request $request, $id)
    {
        $user = Peticiones::findOrFail($id);

        $email = $user->email;
        $password_temporal = $user->password_temporal;
        Mail::to($user->email) -> send(new TempPass($email,$password_temporal));
        //Peticiones::destroy($id); //Si ponemos esto eliminamos la peticion.
        return redirect('home');
    }




}
