<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'data_nascimento', 'genero', 'telefone', 'tipo', 'email', 'senha'];
}
