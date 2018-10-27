<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ciudad;

class CiudadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function ajaxGetCiudad(Request $request)
    {
        
        $ciudades = ciudad::where('paisId', '=', $request['cod_pais'])->get();
        //dd($ciudades);
        return response()->json($ciudades, 200);
    }
}
