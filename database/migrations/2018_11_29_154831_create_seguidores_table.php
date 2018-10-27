<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario1')->unsigned();
            $table->foreign('id_usuario1')->references('id')->on('users');
            $table->integer('id_establecimiento')->unsigned();
            $table->foreign('id_establecimiento')->references('id')->on('users');
            $table->date('fecha_seguidor');
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
        Schema::dropIfExists('seguidores');
    }
}
