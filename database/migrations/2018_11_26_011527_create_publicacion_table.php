<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacion', function (Blueprint $table) {
            $table->increments('id_publicacion');
            $table->integer('id_establecimiento')->unsigned();
            $table->foreign('id_establecimiento')->references('id')->on('users');
            $table->string('tipo_publicacion'); //evento "EVE" o promocion "PRO"
            $table->date('fecha_publicacion');
            $table->string('nombre');
            $table->string('descripcion');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('likes');
            $table->date('fecha_evento'); //no obligatorio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacion');
    }
}
