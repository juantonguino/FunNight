<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('fechaNacimiento');
            $table->string('genero');
            $table->integer('paisActual')->unsigned();
            $table->foreign('paisActual')->references('id')->on('pais');
            $table->integer('ciudadActual')->unsigned();
            $table->foreign('ciudadActual')->references('id')->on('ciudad');
            $table->string('zona'); // "OST" "EST"  "SUR" "NOR"
            $table->string('direccion_residencia');
            $table->integer('telefono');
            $table->integer('celular')->unsigned();
            $table->integer('tipo_establecimiento')->unsigned();
            $table->foreign('tipo_establecimiento')->references('id_tipo_establecimiento')->on('establecimientoT');
            $table->integer('tipo_comida')->unsigned();
            $table->foreign('tipo_comida')->references('id_comida')->on('comidaT');
            $table->integer('tipo_musica')->unsigned();
            $table->foreign('tipo_musica')->references('id_musica')->on('musicaT');
            $table->integer('tipo_ambiente')->unsigned();
            $table->foreign('tipo_ambiente')->references('id_ambiente')->on('ambienteT');
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
