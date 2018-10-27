<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Authenticatable
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'usuarios';
    protected $fillable = [ 'id_user',
        'name', 'email', 'password', 'fechaNacimiento', 'genero', 'paisActual','ciudadActual', 'zona', 'direccion_residencia',  'telefono', 'celular', 
        'tipo_establecimiento', 'tipo_comida', 'tipo_musica', 'tipo_ambiente'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}