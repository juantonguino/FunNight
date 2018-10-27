<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    //
    protected $table = 'comidaT';
	protected $fillable = ['nombre'];
}
