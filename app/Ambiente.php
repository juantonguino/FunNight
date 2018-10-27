<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    //
    protected $table = 'ambienteT';
	protected $fillable = ['nombre'];
}
