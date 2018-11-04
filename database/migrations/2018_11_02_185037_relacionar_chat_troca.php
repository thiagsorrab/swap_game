<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionarChatTroca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats', function(Blueprint $table){
            $table->integer('troca_id')->unsigned();
            $table->foreign('troca_id')->references('id')->on('trocas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function(Blueprint $table){
            $table->dropForeign('chats_trocas_id_foreign');
            $table->dropColumn('troca_id');
        });
    }
}
