<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionaUsurioTroca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trocas', function(Blueprint $table){
            $table->integer('usuario_id1')->unsigned();
            $table->foreign('usuario_id1')->references('id')->on('usuarios');
            $table->integer('usuario_id2')->unsigned();
            $table->foreign('usuario_id2')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trocas', function(Blueprint $table){
            $table->dropForeign('jogos_usuarios_id_foreign');
            $table->dropColumn('usuario_id1');
            $table->dropColumn('usuario_id2');
        });
    }
}
