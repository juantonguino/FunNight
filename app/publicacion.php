<?php

namespace App;

use App\UserEstablecimiento;

use Illuminate\Database\Eloquent\Model;

class publicacion extends Model
{
    protected $table = 'publicacion';
	protected $fillable = ['id_establecimiento', 'tipo_publicacion', 'fecha_publicacion','photo', 'nombre',' descripcion', 
							'fecha_ini','fecha_fin','likes','fecha_evento'];
}

