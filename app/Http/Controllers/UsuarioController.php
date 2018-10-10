<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){

    	$usuarios = \App\Usuario::paginate(15);
    	//dd($usuarios);

    	return view('usuario.index', compact('usuarios'));

    }

    public function adicionar(){

    	return view('usuario.adicionar');

    }

    public function salvar(Request $request){    	

    	//dd($request->all());

    	\App\Usuario::create($request->all());

    	\Session::flash('flash_message', [
    		'msg'=>'Usuario Adicionado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('usuario.adicionar');

    }

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

    public function atualizar(Request $request, $id){
    	\App\Usuario::find($id)->update($request->all());
    	
		\Session::flash('flash_message', [
    		'msg'=>'Usuario Atualizado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('usuario.index');

    }
}
