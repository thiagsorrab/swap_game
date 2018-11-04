<?php

/**
* Classe Model Chat
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //Campos do banco de dados
    protected $fillable = [
    	'status', 'troca_id'
    ];

    //Um Chat pertence a uma troca
    public function troca(){
    	return $this->belongsTo('App\Troca', 'troca_id');
    }

    //Um chat pode ter varias mensagens
    public function mensagems(){
        return $this->hasMany('App\Mensagem', 'chat_id');
    }
}
