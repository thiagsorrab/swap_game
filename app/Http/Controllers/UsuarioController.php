<?php

/**
* Classe Controller Usuario
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UsuarioController extends Controller
{

    //Função que retorna a tela do usuario normal
    public function normal(){
        return view('usuarionormal.index');
    }

    //Função que retorna a tela do usuario admin
    public function admin(){
        return view('usuarioadmin.index');
    }

    //Função que retorna a tela de lista de usuarios
    public function index(){

    	$usuarios = \App\Usuario::paginate(15);
    	//dd($usuarios);

    	return view('usuario.index1', compact('usuarios'));

    }

    //Função que retorna a tela de registro de usuario
    public function registrar(){

    	return view('usuario.registrar');

    }

    //Função que retorna a tela para adicionar novo usuario (Admin que acessa essa tela)
    public function adicionar(){

        return view('usuario.adicionar');

    }

    //Função que salva novo usuario no banco
    public function salvar(Request $request){    	

    	//dd($request->all());

        $dados = $request->all();
        $dados['senha'] = bcrypt($dados['senha']);

        //dd($dados);

    	\App\Usuario::create($dados);

    	\Session::flash('flash_message', [
    		'msg'=>'Usuario Adicionado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('home');

    }

    //Função que retorna tela de edição do usuario
    public function editar($id){
    	$usuario = \App\Usuario::find($id);

    	if(!$usuario){
    		\Session::flash('flash_message', [
	    		'msg'=>'Não existe esse Usuario cadastrado!',
	    		'class'=>'alert-danger'
	    	]);

	    	return redirect()->route('usuario.adicionar');
    	}

    	return view('usuario.editar', compact('usuario'));

    }

    //Função que atualiza o usuario no banco
    public function atualizar(Request $request, $id){

        $dados = $request->all();
        $dados['senha'] = bcrypt($dados['senha']);

    	\App\Usuario::find($id)->update($dados);
    	
		\Session::flash('flash_message', [
    		'msg'=>'Usuario Atualizado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('usuario.index');

    }

    //Função que deleta usuario no banco
    public function deletar($id){

        $usuario = \App\Usuario::find($id);

        $usuario->delete();

        \Session::flash('flash_message', [
            'msg'=>'Usuario Deletado com Sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('usuario.index');

    }
}
