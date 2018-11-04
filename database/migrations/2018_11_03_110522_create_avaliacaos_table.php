<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('avaliacao_user');
            $table->integer('nota');
            $table->integer('usuario_id_avaliado')->unsigned();
            $table->foreign('usuario_id_avaliado')->references('id')->on('usuarios');
            $table->integer('usuario_id_avaliador')->unsigned();
            $table->foreign('usuario_id_avaliador')->references('id')->on('usuarios');
            $table->integer('troca_id')->unsigned();
            $table->foreign('troca_id')->references('id')->on('trocas');
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
        Schema::dropIfExists('avaliacaos');
    }
}
