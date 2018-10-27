<?php

namespace App;

use App\calificacion;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    //
    protected $table = 'calificacion';
	protected $fillable = ['id_establecimiento','id_user', 'puntaje', 'fecha_calificacion'];
