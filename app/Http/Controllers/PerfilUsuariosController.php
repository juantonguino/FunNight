<?php

namespace App\Http\Controllers;

use App\usuarios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilUsuariosController extends Controller
{
    


    public function perfil(){

    	$user = Auth::user();
        // Obtiene el ID del Usuario Autenticado
        $id = Auth::id();

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
                                        co.descripcion as comentario_desc,
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

    	//$usuarios = usuarios::where('id_user', Auth::user()->id);
    	$usuarios =  usuarios::all()->where('id_user', '=', Auth::user()->id);
    	dd($resultado);
        return view('/perfil_user')->with('usuarios', $usuarios)->with('resultado', $resultado);
    }


}
