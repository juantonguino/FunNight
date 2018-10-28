<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();



/*
 *  Middleware administrador
 **/
Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('admin.index');
});



/*
 * Middleware Usuario
 * */
Route::group(['prefix'=>'user', 'middleware'=>['auth', 'user']], function () {

    Route::get('/', function () {
        return view('inicio_usuario');
    })->name('user.index');

    Route::get('/home_user', function () {
        return view('inicio_usuario');
    })->name('user.home');

    //SUMA UN LIKE A LA PUBLICACION.
    Route::get('/suma_like', 'PerfilEstablecimientoController@like');

    //CARGAR EL PERFIL DEL ESTABLECIMIENTO VISITADO POR UN USUARIO
    Route::get('/perfilSeleccionado/{id}', 'PerfilEstablecimientoController@inicio');
});



/*
 * Middleware Usuario
 * */
Route::group(['prefix'=>'establecimiento', 'middleware'=>['auth', 'vendor']], function () {
    
    /* EL ESTABLECIMIENTO CREA UNA PUBLICACION NUEVA */
    Route::post('/publicacionNueva', 'HomeController@nuevo');

    //MODIFICAR PERFIL DEL ESTABLECIMIENTO
    Route::get('/perfil', 'perfilController@inicio');

    /* SISTEMA DE RECOMENDACION POR SITIO VISITADO POR AMIGO EN COMÚN */
    Route::get('/algoritmo1', 'RecomendacionAmigosController@index_hoy');

    //CARGAR ARCHIVO DE LA UNA PUBLICACION NUEVA
    Route::post('/ModificoFoto', 'HomeController@archivos');

    /*  PERFIL ESTABLECIMIENTO  */
    Route::get('/home', 'HomeController@index')->name('home');

    //MODIFICAR PERFIL DEL ESTABLECIMIENTO
    Route::get('/ModificoPerfilRuta', 'perfilController@inicio');
    Route::post('/ModificoPerfil', 'perfilController@updateProfile');

});

Route::get('/home_user', function () {
    return view('inicio_usuario');
});

Route::get('/confirmarUser', function () {
    return view('confirmarUser');
});

Route::get('/registrar', 'HomeController@registrar');



/*  REGISTRO  */
Route::get('/registerEstablecimiento', 'HomeController@registerEstablecimiento');

Route::post('/registrarEst', 'Auth\RegisterEstablecimientoController@registerEst');

Route::get('/ajaxGetCiudad', 'CiudadController@ajaxGetCiudad');



//CARGAR EL PERFIL DEL ESTABLECIMIENTO VISITADO POR UN USUARIO
Route::get('/perfilSeleccionado/{id}', 'PerfilEstablecimientoController@inicio');



//SUMA UN LIKE A LA PUBLICACION.
Route::get('/suma_like', 'PerfilEstablecimientoController@like');


/*  PERFIL ESTABLECIMIENTO  */
Route::get('/home', 'HomeController@index')->name('home');
//MODIFICAR PERFIL DEL ESTABLECIMIENTO
Route::get('/perfil', 'perfilController@inicio');
//MODIFICAR PERFIL DEL ESTABLECIMIENTO
Route::get('/ModificoPerfilRuta', 'perfilController@inicio');
Route::post('/ModificoPerfil', 'perfilController@updateProfile');

//CARGAR ARCHIVO DE LA UNA PUBLICACION NUEVA
Route::post('/ModificoFoto', 'HomeController@archivos');


/* PERFIL USUARIO  */
Route::get('/perfil_u', 'PerfilUsuariosController@perfil');



/* SISTEMA DE RECOMENDACION POR SITIO VISITADO POR AMIGO EN COMÚN */
Route::get('/algoritmo1', 'RecomendacionAmigosController@index_hoy');

Route::get('/algoritmo2', 'RecomendacionAmigosController@index');


/* ALGORITMO QUE MUESTRA LAS PUBLICACIONES DEL ESTABLECIMIENTO CONECTADO */
Route::get('/publicaciones_est', 'RecomendacionAmigosController@publicaciones');


Route::get('/loginconfirm', function () {
    return view('auth.login');
});


/* EL ESTABLECIMIENTO CREA UNA PUBLICACION NUEVA */
Route::post('/publicacionNueva', 'HomeController@nuevo');
//Route::post('/publicacionNueva', 'HomeController@index')->name('home');



/*Route::middleware(['auth'])->group(function(){

	Route::get('/register/{id}', 'Auth\RegisterController@showciudades')->name('showciudades');

	/*Route::get('register/{id}', 'Auth\RegisterController@showciudades'); 

}); */