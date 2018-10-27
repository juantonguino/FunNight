<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Intervention\Image\Image as Image;


use Intervention\Image\ImageManager;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\UserEstablecimiento;
use App\pais;
use App\Comida;
use App\Ambiente;
use App\Musica;
use App\EstablecimientoT;
use App\User;
use App\Permisos;
use App\publicacion;
use App\archivos;
use Carbon\Carbon;
use App\foto_tmp;


class HomeController extends Controller
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
    public function index()
    { $user = Auth::user();
        // Obtiene el ID del Usuario Autenticado
        $id = Auth::id();

        $roleuser = DB::select("SELECT u.role from users u where u.id = ? ", array($id, $id));
        //dd($roleuser);
        if ($roleuser[0]->role == 'establecimiento') {
            $datos = DB::select("SELECT u.nombre nombre, u.nit nit, u.email email, 
                                        (SELECT nombre from pais p where  p.id = u.paisActual) paisActual, (SELECT c.nombre from ciudad c where c.id=u.ciudadActual)  ciudadActual, u.zona zona,
                                        u.direccion direccion, u.telefono telefono,  u.celular celular, 
                                        (SELECT t.nombre from establecimientot t where t.id_tipo_establecimiento = u.tipo_establecimiento)  tipo_establecimiento, 
                                        (SELECT co.nombre from comidat co where co.id_comida = u.tipo_comida) tipo_comida, 
                                        (SELECT mu.nombre from musicat mu where mu.id_musica = u.tipo_musica) tipo_musica,  
                                        (SELECT ti.nombre from ambientet ti where ti.id_ambiente = u.tipo_ambiente)  tipo_ambiente,
                                        u.rangoPrecios rangoPrecios from  usersestablecimiento u where u.id_user = ? ", array($id, $id));

        }else {
              $datos = DB::select("SELECT u.name nombre, u.email email, u.fechaNacimiento fechaNacimiento,
                                    u.genero genero, (SELECT nombre from pais p where  p.id = u.paisActual) paisActual, 
                                    (SELECT c.nombre from ciudad c where c.id=u.ciudadActual) ciudadActual, 
                                    u.zona zona, u.direccion_residencia direccion_residencia, 
                                    u.telefono telefono,u.celular celular, 
                                    (SELECT t.nombre from establecimientot t where t.id_tipo_establecimiento = u.tipo_establecimiento) tipo_establecimiento, 
                                    (SELECT co.nombre from comidat co where co.id_comida = u.tipo_comida) tipo_comida,
                                    (SELECT mu.nombre from musicat mu where mu.id_musica = u.tipo_musica) tipo_musica, 
                                    (SELECT ti.nombre from ambientet ti where ti.id_ambiente = u.tipo_ambiente) tipo_ambiente
                                     from usuarios u where u.id_user = ? ", array($id, $id));

            }

        $resultado = DB::select("SELECT p.vista 
                                    from permisos p 
                                    where p.role = (select u.role from users u where u.id = ? and u.role = p.role)
                                    and p.accion = 'perfil'  ", array($id, $id)); 
        
        //dd($resultado[0]->vista);
        return view($resultado[0]->vista)->with('datos',$datos);
    }



    public function registerEstablecimiento(){
        $paiseslist = pais::all();
        $ComidaList = Comida::all();
        $AmbienteList = Ambiente::all();
        $MusicaList = Musica::all();
        $establecimientoTList = EstablecimientoT::all();
        //dd($paiseslist);
        return view('auth.registerEstablecimiento')
        ->with('paiseslist', $paiseslist)->with('comidalist', $ComidaList)->with('ambientelist', $AmbienteList)
        ->with('musicalist', $MusicaList)->with('establecimientoTList', $establecimientoTList);

    }

    public function registrar()
    {
        $paiseslist = pais::all();
        $ComidaList = Comida::all();
        $AmbienteList = Ambiente::all();
        $MusicaList = Musica::all();
        $establecimientoTList = EstablecimientoT::all();
        //dd($paiseslist);
        return view('auth.register')
        ->with('paiseslist', $paiseslist)->with('comidalist', $ComidaList)->with('ambientelist', $AmbienteList)
        ->with('musicalist', $MusicaList)->with('establecimientoTList', $establecimientoTList);
    }

    

    protected function nuevo(Request $request)
    
    {   //NOBRE ENCRIPTADO PARA EL ARCHIVO
        $name =   str_random(30) . '-' . $request->file('image')->getClientOriginalName();
        
        //SE GUARDA EL ARCHIVO EN LA CARPETA STORAGE
        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('/home')->withErrors($validator);
        }
        else{
            
            $request->file('image')->move(public_path('/storage'), $name);
            //$request->file('image')->move(public_path('/storage'));
            
        }


        $id = Auth::id();
        $id_estable = DB::select("SELECT u.id_user from usersestablecimiento u where u.id_user = ? ", array($id, $id)); 

        
        
        DB::beginTransaction();
        $usert = new \App\publicacion;
        $usert->id_establecimiento  =$id;
        $usert->tipo_publicacion = $request['tipo_publicacion'];
        $usert->fecha_publicacion = Carbon::today();
        $usert->nombre = $request['nombreP'];
        $usert->descripcion = $request['descripcion'];
        $usert->fecha_ini = $request['fecha_ini'];
        $usert->fecha_fin = $request['fecha_fin'];
        $usert->likes = 0;
        $usert->fecha_evento = $request['fecha_evento'];
        //$usert->save();
        if($usert->save()){
            
            $arc = new \App\archivos;
            $arc->photo = ('storage/'.$name );
            $arc->id_archivos = $usert->id;
            //$arc->save();
            if($arc->save()){
                DB::commit();
            }else{
                DB::rollback();
             } 
             }     


        return $this->index();

        
    }

   

    
}
