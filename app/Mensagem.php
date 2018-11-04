<?php

/**
* Classe Model Mensagem
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    //Campos do banco de dados
    protected $fillable = [
    	'msg', 'usuario_id', 'chat_id'
    ];

    //Um Chat pertence a uma troca
    public function chat(){
    	return $this->belongsTo('App\Chat', 'chat_id');
    }

    //Um Chat pertence a uma troca
    public function usuario(){
    	return $this->belongsTo('App\Usuario', 'usuario_id');
    }
}
