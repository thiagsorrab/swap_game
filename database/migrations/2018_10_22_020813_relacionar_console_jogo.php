<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacionarConsoleJogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jogos', function(Blueprint $table){
            $table->integer('console_id')->unsigned();
            $table->foreign('console_id')->references('id')->on('consoles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jogos', function(Blueprint $table){
            $table->dropForeign('jogos_consoles_id_foreign');
            $table->dropColumn('console_id');
        });
    }
}
