<?php

/**
* Classe Model Jogo
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    //Campos do banco de dados
    protected $fillable = [
    	'titulo', 'estado', 'detalhes', 'console_id', 'imagem', 'usuario_id', 'statustroca'
    ];

    //Um jogo pertence a um console
    public function console(){
    	return $this->belongsTo('App\Console', 'console_id');
    }

    //Um jogo pertence a um usuario
    public function usuario(){
    	return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    //Um jogo pode está participando de varias trocas
    public function troca1(){
        return $this->hasMany('App\Troca', 'jogo_id1');
    }

    //Um jogo pode está participando de varias trocas
    public function troca2(){
        return $this->hasMany('App\Troca', 'jogo_id2');
    }
}
