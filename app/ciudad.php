<?php
namespace App;

use App\pais;
use App\ciudad;

use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
	protected $table = 'ciudad';
	protected $fillable = ['nombre', 'paisId'];


}