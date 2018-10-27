<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id_coment');
            $table->integer('id_publicacion')->unsigned();
            $table->foreign('id_publicacion')->references('id_publicacion')->on('publicacion');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id')->on('users');
            $table->integer('id_establecimiento')->unsigned();
            $table->foreign('id_establecimiento')->references('id')->on('users');
            $table->date('fecha_publicacion');
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
        Schema::dropIfExists('comentarios');
    }
}
