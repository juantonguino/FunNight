<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersestablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersestablecimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nombre');
            $table->string('nit');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('paisActual')->unsigned();
            $table->foreign('paisActual')->references('id')->on('pais');
            $table->integer('ciudadActual')->unsigned();
            $table->foreign('ciudadActual')->references('id')->on('ciudad');
            $table->string('zona'); // "OST" "EST"  "SUR" "NOR"
            $table->string('direccion');
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
            $table->string('rangoPrecios');
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
        Schema::dropIfExists('usersestablecimiento');
    }
}
