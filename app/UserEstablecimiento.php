<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserEstablecimiento extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'usersestablecimiento';
    protected $fillable = ['id_user','nombre', 'nit', 'email', 'password', 'paisActual','ciudadActual', 'zona', 'direccion',  
    'telefono', 'celular', 'tipo_establecimiento', 'tipo_comida', 'tipo_musica', 'tipo_ambiente', 'rangoPrecios' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}