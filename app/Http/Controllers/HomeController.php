<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Peticiones;
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

        $peticiones = Peticiones::all();
        return view('home')->with(['peticiones'=>$peticiones]);

    }


}
