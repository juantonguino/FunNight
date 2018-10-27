<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;





use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RecomendacionAmigosController extends Controller
{

// ALGORITMO QUE RECOMIENDA LOS SITIOS VISITADOS POR UN AMIGO EN COMÚN Y QUE AÚN NO LO HA VISITADO EL USUARIO.
   public function index()
    {
    	$user = Auth::user();
    	// Obtiene el ID del Usuario Autenticado
		$id = Auth::id();

    	$resultado = DB::select(" SELECT DISTINCT publicacion_hoy.*
                                from
                                    (SELECT
                                        c.id_publicacion as id_p,
                                        a.id_user as id,
                                        a.nombre as nombre,
                                        b.nombre as tipo_estable,
                                        c.nombre as nombre_publicacion,
                                        c.descripcion as descripcion,
                                        ar.photo as foto,
                                        c.likes as likes,
                                        DATE_FORMAT(c.fecha_ini, '%Y-%m-%d') as fecha_ini,
                                        DATE_FORMAT(c.fecha_fin, '%Y-%m-%d') as fecha_fin,
                                        DATE_FORMAT(c.fecha_publicacion, '%Y-%m-%d') as fecha_publicacion,
                                        c.created_at as fecha_creacion
                                    FROM 
                                        usersestablecimiento as a,
                                        establecimientoT as b,
                                        users s,
                                        publicacion as c LEFT OUTER JOIN archivos as ar   ON 
                                         ar.id_archivos = c.id_publicacion
                                    WHERE b.id_tipo_establecimiento = a.tipo_establecimiento
                                    AND  c.id_establecimiento = a.id_user
                                    AND s.id = a.id_user


                                    AND  c.fecha_fin >= DATE_FORMAT(NOW(), '%Y-%m-%d')
                                    ) as publicacion_hoy,
                                    
                                    ( SELECT ami.id_usuario2 as amigo, s.id_establecimiento id_establecimiento
                                        from 
                                            amigos ami, 
                                            seguidores s
                                        where ami.id_usuario1 = ?
                                        and ami.id_usuario2 = s.id_usuario1 
                                        and s.id_usuario1 <> ami.id_usuario1
                                        and s.id_establecimiento  not in (select se.id_establecimiento from seguidores se where se.id_usuario1 = ?) 
                                     
                                    ) AS M 
                            WHERE
                                publicacion_hoy.id = M.id_establecimiento
                                order by publicacion_hoy.fecha_creacion desc", array($id, $id));				    

        return response()->json($resultado, 200);
	

	}








//ALGORITMO DE RECOMENDACION, MUESTRA LAS PUBLICACIONES MAS RECIENTES DE LOS ESTABLECIMIENTO A LOS CUALES SIGO. 
     public function index_hoy()
    {
        $user = Auth::user();
        // Obtiene el ID del Usuario Autenticado
        $id = Auth::id();
        $id=25;
        $resultado = DB::select("SELECT DISTINCT publicacion_hoy.*
                                from
                                    (SELECT
                                        c.id_publicacion as id,
                                        a.nombre as nombre,
                                        b.nombre as tipo_estable,
                                        c.nombre as nombre_publicacion,
                                        c.descripcion as descripcion,
                                        ar.photo as foto,
                                        c.likes as likes,
                                        DATE_FORMAT(c.fecha_ini, '%Y-%m-%d') as fecha_ini,
                                        DATE_FORMAT(c.fecha_fin, '%Y-%m-%d') as fecha_fin,
                                        DATE_FORMAT(c.fecha_publicacion, '%Y-%m-%d') as fecha_publicacion,
                                        c.created_at as fecha_creacion
                                    FROM 
                                        usersestablecimiento as a,
                                        establecimientoT as b,
                                        users s,
                                        seguidores se,
                                        publicacion as c LEFT OUTER JOIN archivos as ar   ON 
                                         ar.id_archivos = c.id_publicacion
                                    WHERE b.id_tipo_establecimiento = a.tipo_establecimiento
                                    AND  c.id_establecimiento = a.id_user
                                     AND se.id_usuario1 = s.id
                                     AND se.id_establecimiento = c.id_establecimiento
                                     AND s.id = ?
                                    AND  c.fecha_fin >= DATE_FORMAT(NOW(), '%Y-%m-%d')
                                   
                                    ) as publicacion_hoy
                                     order by fecha_creacion desc", array($id, $id));                    

        return response()->json($resultado, 200);
    

    }




    public function publicaciones()
    {
        $user = Auth::user();
        // Obtiene el ID del Usuario Autenticado
        $id = Auth::id();
        //dd($id);

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
                                    c.id_publicacion as id,
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
                                     order by t.created_at desc", array($id, $id));                    

        return response()->json($resultado, 200);
    

    }

}
