<?php

/**
* Classe Model Console
*
**/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
	//Campos do Banco de dados
    protected $fillable = [
    	'modelo'
    ];

    //Um console pode ter varios jogos
    public function jogos(){
    	return $this->hasMany('App\Jogo', 'console_id');
    }
}
