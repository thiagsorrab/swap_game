<?php

/**
* Classe Controller Console
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Console;

use App\Jogo;

class ConsoleController extends Controller
{

    //Função index que retorna a tela lista os consoles, 15 e cada pagina
    public function index(){

    	$consoles = Console::paginate(15);
    	//dd($consoles);

    	return view('console.index1', compact('consoles'));

    }

    //Função que retorna a tela de adiconar um novo console
    public function adicionar(){

    	return view('console.adicionar');

    }


    //Função salva um novo console no banco de dados
    public function salvar(Request $request){    	
    	
    	Console::create($request->all());

    	\Session::flash('flash_message', [
    		'msg'=>'Console Adicionado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('console.index');

    } 

    //Função que retorna a tela para edição do console
    public function editar($id){
    	$console = Console::find($id);

    	if(!$console){
    		\Session::flash('flash_message', [
	    		'msg'=>'Não existe esse Console cadastrado!',
	    		'class'=>'alert-danger'
	    	]);

	    	return redirect()->route('console.adicionar');
    	}

    	return view('console.editar', compact('console'));

    }

    //Função que atualiza e salva no banco de dados um console
    public function atualizar(Request $request, $id){           

    	Console::find($id)->update($request->all());
    	
		\Session::flash('flash_message', [
    		'msg'=>'Console Atualizado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('console.index');

    }

    //Função que deleta o console do banco de dados
    public function deletar($id){

        if(Jogo::where('console_id', '=', $id)->count()){
            $msg = "Não é possível excluir esse console pois já tem jogo cadastrado a ele.";

            \Session::flash('flash_message', [
                'msg'=>$msg,
                'class'=>'alert-danger'
            ]);
            return redirect()->route('console.index');

        }

        $console = Console::find($id);

        $console->delete();

        \Session::flash('flash_message', [
            'msg'=>'Console Deletado com Sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('console.index');

    }

}
