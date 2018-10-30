<?php

/**
* Classe Controller Jogo
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Jogo;
use App\Console;

class JogoController extends Controller
{

    //Função para mostrar os jogos do usuario logado
    public function meusjogos(){

        $jogos = Jogo::where('usuario_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);            

        return view('jogo.index1', compact('jogos'));
    }

    //Função para mostrar todos dos jogos no sistema
    public function index(){

    	$jogos = Jogo::orderBy('id', 'desc')->paginate(15);
    	//dd($jogos);

    	return view('jogo.index1', compact('jogos'));

    }

    //Função que retorna a tela para cadastrar novo jogo
    public function adicionar(){

    	$consoles = Console::all();

    	return view('jogo.adicionar1', compact('consoles'));

    }

    //Função para salvar novo jogo no banco de dados
    public function salvar(Request $request){   

        $jogo = $request->all();

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $name = kebab_case($jogo['titulo']).time();

            $extension = $request->imagem->extension();

            $nameFile = "{$name}.{$extension}";

            $jogo['imagem'] = $nameFile;

            $upload = $request->imagem->storeAs('jogos', $nameFile);

            if (!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload');

        }
    	
    	Jogo::create($jogo);

    	\Session::flash('flash_message', [
    		'msg'=>'Jogo Adicionado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('jogo.index');

    }

    //Função que retorna a tela de edição do jogo
    public function editar($id){
    	$jogo = Jogo::find($id);
    	$consoles = Console::all();

    	if(!$jogo){
    		\Session::flash('flash_message', [
	    		'msg'=>'Não existe esse jogo cadastrado!',
	    		'class'=>'alert-danger'
	    	]);

	    	return redirect()->route('jogo.adicionar');
    	}

    	return view('jogo.editar1', compact('jogo', 'consoles'));

    }

    //Função que atualiza o jogo no banco de dados
    public function atualizar(Request $request, $id){  

        $jogo = $request->all();

        $jogoantigo = Jogo::find($id);

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $name = kebab_case($jogo['titulo']).time();

            $extension = $request->imagem->extension();

            $nameFile = "{$name}.{$extension}";

            $jogo['imagem'] = $nameFile;

            $upload = $request->imagem->storeAs('jogos', $nameFile);

            if (!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload');

        } else{
            $jogo['imagem'] = $jogoantigo['imagem'];
        }

    	Jogo::find($id)->update($jogo);
    	
		\Session::flash('flash_message', [
    		'msg'=>'jogo Atualizado com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('jogo.index');

    }

    //Função deleta jogo no banco
    public function deletar($id){

        $jogo = Jogo::find($id);

        $jogo->delete();

        \Session::flash('flash_message', [
            'msg'=>'jogo Deletado com Sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('jogo.index');

    }
}
