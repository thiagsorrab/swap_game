<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionarMensagemChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensagems', function(Blueprint $table){
            $table->integer('chat_id')->unsigned();
            $table->foreign('chat_id')->references('id')->on('chats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensagems', function(Blueprint $table){
            $table->dropForeign('mensagems_chats_id_foreign');
            $table->dropColumn('chat_id');
        });
    }
}
