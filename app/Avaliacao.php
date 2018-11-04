<?php

/**
* Classe Model Avaliacao
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    //Campos do Banco de dados
	protected $fillable = [
    	'avaliacao_user', 'nota', 'usuario_id_avaliado', 'usuario_id_avaliador', 'troca_id'
    ];

    //Uma Avaliacao tem um usuario Avaliado
    public function usuarioAvaliado(){
    	return $this->belongsTo('App\Usuario', 'usuario_id_avaliado');
    }

    //Uma Avaliacao tem um usuario Avaliador
    public function usuarioAvaliador(){
    	return $this->belongsTo('App\Usuario', 'usuario_id_avaliador');
    }

    //Uma Avaliacao pertence a uma troca
    public function troca(){
    	return $this->belongsTo('App\Troca', 'troca_id');
    }

}
