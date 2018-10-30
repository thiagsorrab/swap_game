<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionaJogoTroca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trocas', function(Blueprint $table){
            $table->integer('jogo_id1')->unsigned();
            $table->foreign('jogo_id1')->references('id')->on('jogos');
            $table->integer('jogo_id2')->unsigned();
            $table->foreign('jogo_id2')->references('id')->on('jogos');
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
            $table->dropForeign('jogos_jogos_id_foreign');
            $table->dropColumn('jogo_id1');
            $table->dropColumn('jogo_id2');
        });
    }
}
