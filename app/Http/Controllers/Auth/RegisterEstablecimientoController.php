<?php

namespace App\Http\Controllers\Auth;

use App\UserEstablecimiento;
use App\pais;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RegisterEstablecimientoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/loginconfirm';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           // 'celular' => 'required|int|max:20|confirmed',
            //  'telefono' => 'required|int|max:14|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    


    protected function registerEst(Request $request)
    
    {   
        $this->validator($request->all())->validate();

        DB::beginTransaction();
        $usert = new \App\User;
        $usert->name = $request['name'];
        $usert->email = $request['email'];
        $usert->password = bcrypt($request['password']);
        $usert->role = 'establecimiento';
        $usert->foto = '/storage/perfil.png';
        //DB::commit();
        $usert->save();
         if($usert->save()){
            $user = new \App\UserEstablecimiento;
            $user->id_user = $usert->id;
            //$str =  User::where('email', '=', $request['email'])->pluck('id');//->select('id') ;

            $user->nombre = $request['name'];
            $user->nit = $request['nit'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
            $user->paisActual = $request['paisId'];
            $user->ciudadActual = $request['ciudad'];
            $user->zona = $request['zona'];
            $user->direccion = $request['direccion'];
            $user->telefono = $request['telefono'];
            $user->celular = $request['celular'];
            $user->tipo_establecimiento = $request['id_tipo_establecimiento'];
            $user->tipo_comida = $request['id_comida'];
            $user->tipo_musica= $request['id_musica'];
            $user->tipo_ambiente = $request['id_ambiente'];
            $user->rangoPrecios = $request['rango_precio'];
            $user->save();
            DB::commit();
         }
         else{
            DB::rollback();
         }       

        return view('confirmarUser');
    }
}
