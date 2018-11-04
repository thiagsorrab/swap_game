<?php

/**
* Classe Model Troca
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Troca extends Model
{
    //Campos do Banco de dados
	protected $fillable = [
    	'status', 'usuario_id1', 'usuario_id2', 'jogo_id1', 'jogo_id2'
    ];

    //Uma troca tem um usuario participando
    public function usuario1(){
    	return $this->belongsTo('App\Usuario', 'usuario_id1');
    }

    //Uma troca tem um usuario participando
    public function usuario2(){
    	return $this->belongsTo('App\Usuario', 'usuario_id2');
    }

    //Um jogo participa de uma troca
    public function jogo1(){
    	return $this->belongsTo('App\Jogo', 'jogo_id1');
    }

    //Um jogo participa de uma troca
    public function jogo2(){
    	return $this->belongsTo('App\Jogo', 'jogo_id2');
    }

    //Uma troca tem um Chat
    public function chat(){
        return $this->belongsTo('App\Chat', 'troca_id');
    }

    //Uma troca tem uma avaliação
    public function avaliacao(){
        return $this->belongsTo('App\Avaliacao', 'troca_id');
    }
}
