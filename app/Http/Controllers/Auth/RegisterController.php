<?php

namespace App\Http\Controllers\Auth;

use App\usuarios;
use App\pais;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
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

    use RegistersUsers;

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
        //if (Auth :: check () && $ checkUser === $ username)
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
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    


    protected function create(array $data)
    {   
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'usuario',
            'foto' => '/storage/perfil.png'
            ]);
        if($user){
            DB::beginTransaction();
            $usert = new \App\usuarios;
            $usert->id_user = $user->id;
            $usert->name = $data['name'];
            $usert->email = $data['email'];
            $usert->password = bcrypt($data['password']);
            $usert->fechaNacimiento = $data['fechaNacimiento'];
            $usert->genero = $data['genero'];
            $usert->paisActual = $data['paisId'];
            $usert->ciudadActual = $data['ciudad'];
            $usert->zona = $data['zona'];
            $usert->direccion_residencia = $data['direccion'];
            $usert->telefono = $data['telefono'];
            $usert->celular = $data['celular'];
            $usert->tipo_establecimiento = $data['id_tipo_establecimiento'];
            $usert->tipo_comida = $data['id_comida'];
            $usert->tipo_musica = $data['id_musica'];
            $usert->tipo_ambiente = $data['id_ambiente'];
            if($usert->save()){
                DB::commit();
            }else{
                DB::rollback();
             }       

         }

         return $user;
        }
        
         
        
    }

