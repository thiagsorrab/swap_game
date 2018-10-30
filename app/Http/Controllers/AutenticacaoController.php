<?php

/**
* Classe Controller Autenticação
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Usuario;

class AutenticacaoController extends Controller
{    
    //Funcão retorna a tela de login
    public function login(){
    	return view('autenticacao.login1');
    }

    //Função verifica e-mail e senha e manda o usuario para sua tela dependendo do tipo
    public function logar(Request $request){

    	$dados = $request->all();

    	$email = $dados['email'];
    	$senha = $dados['senha'];

    	$usuario = Usuario::where('email', $email)->first();

    	if(Auth::check() || ($usuario && Hash::check($senha, $usuario->senha))){

    		Auth::login($usuario);
    		\Session::flash('flash_message', [
	    		'msg'=>'Logado no Sistema!',
	    		'class'=>'alert-success'
	    	]);
	    	//Tela do Usuario
	    	if(Auth::user()->tipo == "1"){
	    		return redirect(route('usuario.normal'));
	    	}
	    	//Tela do Admin
	    	else if(Auth::user()->tipo == "0"){
	    		return redirect(route('usuario.admin'));
	    	}
    		

    	} else {
    		\Session::flash('flash_message', [
	    		'msg'=>'Não foi possivel logar no Sistema!',
	    		'class'=>'alert-danger'
	    	]);
    		return redirect(route('login'));
    	}

    }

    //Função para sair do sistema
    public function logout(){

    	Auth::logout();
    	\Session::flash('flash_message', [
	    		'msg'=>'Saiu do Sistema!',
	    		'class'=>'alert-success'
	    	]);
    	return redirect(route('home'));

    }

}
