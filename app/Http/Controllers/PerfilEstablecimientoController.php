<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use APP\publicacion;

class PerfilEstablecimientoController extends Controller
{

    public function like (Request $request){
      $id = $request['cod_id'];
      $publicacion_t =  publicacion::find($id);
      $num_likes = $publicacion_t->likes;
      $num_likes = $num_likes + 1;
      $publicacion_t->likes = $num_likes;
      $usert->save();
      return response()->json($num_likes, 200);

    }

     public function search(Request $request)
{
     if($request->ajax()){
         $dato=$request['id']; //Aqui obtienes el valor del input ajax

          return Response::json($dato);
     }
}
    
    public function inicio($id)
    {

       // Obtiene el ID de la publicacion
       $id_publicacion = $id;

        $id_est = DB::select("SELECT u.id from users u, publicacion p 
                        where p.id_publicacion = ? 
                        and p.id_establecimiento = u.id ", array($id_publicacion, $id_publicacion));

        
        $id_user = Auth::id();
        $id_est_none=(string) $id_est[0]->id;
        //dd(gettype($id_est_none));
        //dd($id_est[0]->id);
        
        $datos = DB::select("SELECT u.name nombre, u.email email, u.fechaNacimiento fechaNacimiento,
                                    u.genero genero, (SELECT nombre from pais p where  p.id = u.paisActual) paisActual, 
                                    (SELECT c.nombre from ciudad c where c.id=u.ciudadActual) ciudadActual, 
                                    u.zona zona, u.direccion_residencia direccion_residencia, 
                                    u.telefono telefono,u.celular celular, 
                                    (SELECT t.nombre from establecimientot t where t.id_tipo_establecimiento = u.tipo_establecimiento) tipo_establecimiento, 
                                    (SELECT co.nombre from comidat co where co.id_comida = u.tipo_comida) tipo_comida,
                                    (SELECT mu.nombre from musicat mu where mu.id_musica = u.tipo_musica) tipo_musica, 
                                    (SELECT ti.nombre from ambientet ti where ti.id_ambiente = u.tipo_ambiente) tipo_ambiente
                                     from usuarios u where u.id = ? ", array($id_est_none,$id_est_none ));        
        $resultado = DB::select("SELECT 
                                    t.id as id,
                                    t.nombre as nombre,
                                    t.tipo_estable as tipo_estable,
                                    t.nombre_publicacion as nombre_publicacion,
                                    t.descripcion as descripcion,
                                    t.foto as foto,
                                    t.likes as likes,
                                    t.created_at fecha_hoy,
                                    DATE_FORMAT(t.fecha_ini, '%Y-%m-%d') as fecha_ini,
                                    DATE_FORMAT(t.fecha_fin, '%Y-%m-%d') as fecha_fin,
                                    DATE_FORMAT(t.fecha_publicacion, '%Y-%m-%d') as fecha_publicacion
                                    from (
                                    select 
                                    a.id as id,
                                    a.nombre as nombre,
                                    b.nombre as tipo_estable,
                                    c.nombre as nombre_publicacion,
                                    c.descripcion as descripcion,
                                    ar.photo as foto,
                                    c.likes as likes,
                                    c.created_at,
                                    DATE_FORMAT(c.fecha_ini, '%Y-%m-%d') as fecha_ini,
                                    DATE_FORMAT(c.fecha_fin, '%Y-%m-%d') as fecha_fin,
                                    DATE_FORMAT(c.fecha_publicacion, '%Y-%m-%d') as fecha_publicacion,
                                        c.id_publicacion from 
                                     usersestablecimiento as a,
                                     users s,
                                      establecimientoT as b,
                                      publicacion as c LEFT OUTER JOIN archivos as ar   ON 
                                         ar.id_archivos = c.id_publicacion
                                     where a.tipo_establecimiento = b.id_tipo_establecimiento
                                      AND  c.id_establecimiento = s.id
                                      AND s.id = a.id_user  
                                      AND  c.fecha_fin >=  DATE_FORMAT(NOW(), '%Y-%m-%d')  
                                      AND s.id = ?
                                     order by c.created_at desc) t LEFT OUTER JOIN comentarios co ON t.id_publicacion = co.id_publicacion 
                                     order by t.created_at desc", array($id_est_none, $id_est_none));           
        //dd($datos);
        return view('HomePerfilEstablecimiento')->with('datos', $datos)->with('resultado', $resultado);

    }
        
       
}
  
