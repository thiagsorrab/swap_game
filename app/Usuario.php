<?php

/**
* Classe Model Usuario
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
	use Notifiable;

    //Campos do banco de dados
    protected $fillable = [
    	'nome', 'data_nascimento', 'genero', 'telefone', 'tipo', 'email', 'senha'
    ];

    //Campo protegido
    protected $hidden = [
    	'senha'
    ];

    //Um usuario pode ter varios jogos
    public function jogos(){
    	return $this->hasMany('App\Jogo', 'usuario_id');
    }

    //Um usuario pode participar de varias trocas
    public function troca1(){
        return $this->hasMany('App\Troca', 'usuario_id1');
    }

    //Um usuario pode participar de varias trocas
    public function troca2(){
        return $this->hasMany('App\Troca', 'usuario_id2');
    }

    //Uma Avaliacao tem um usuario Avaliado
    public function Avaliacao(){
        return $this->hasMany('App\Avaliacao', 'usuario_id_avaliado');
    }

    //Uma Avaliacao tem um usuario Avaliador
    public function Avaliador(){
        return $this->hasMany('App\Avaliacao', 'usuario_id_avaliador');
    }

}
