<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    //
    protected $table = 'permisos';
	protected $fillable = ['role','accion','vista'];
}
