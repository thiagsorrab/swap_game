<?php

/**
* Classe Controller Troca
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jogo;
use App\Usuario;
use App\Troca;
use App\Avaliacao;

class TrocaController extends Controller
{   
    //Função abre a tela do jogo para inicar a troca
    public function index($id){

    	$jogo1 = Jogo::find($id);        

    	$seusjogos = Jogo::where('usuario_id', Auth::user()->id)->paginate(15);

        $avaliacoes = Avaliacao::where('usuario_id_avaliado', $jogo1->usuario->id)->paginate(15);

        $avaliacoes->media = $avaliacoes->avg('nota');

        $porcentagemestrela = 1 - ($avaliacoes->media/5);

        $avaliacoes->tamanhoestrela = (130 * $porcentagemestrela) * -1;

        //dd($avaliacoes);
    	
        return view('troca.index', compact('jogo1', 'seusjogos', 'avaliacoes'));

    }

    //Função que da inicio a troca do jogo
    public function inicio(Request $request){

    	$troca = $request->all();

    	Troca::create($troca);

    	\Session::flash('flash_message', [
    		'msg'=>'Troca iniciada com Sucesso!
    		Só aguardar o outro jogador Aceitar ou Recusa a troca.
    		',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('jogo.index');

    }

    //Função lista suas trocas
    public function lista(){

    	$trocasrecebidas = Troca::where('usuario_id1', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

    	$trocassolicitadas = Troca::where('usuario_id2', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

    	//dd($trocassolicitadas);

    	//$jogos = Jogo::where('usuario_id', Auth::user()->id)->paginate(15);    	

    	return view('troca.lista', compact('trocasrecebidas', 'trocassolicitadas'));
    }

    //Função que realiza a troca de jogo
    public function realiza(Request $request, $id){  

        $troca = $request->all();

        $jogo1 = Jogo::find($troca['jogo_id1']);

        $jogo2 = Jogo::find($troca['jogo_id2']);

        $jogo1['statustroca'] = "Trocado";

        $jogo2['statustroca'] = "Trocado";

        $jogo1->update();
        $jogo2->update();

        Troca::find($id)->update($troca);        
        
        \Session::flash('flash_message', [
            'msg'=>'Troca realizada com Sucesso!',
            'class'=>'alert-success'
        ]);

        return redirect()->route('jogo.index');

    }

    //Função que recusa a troca do jogo
    public function recusa(Request $request, $id){  

        $troca = $request->all();

        Troca::find($id)->update($troca);       
        
        \Session::flash('flash_message', [
            'msg'=>'Troca Recusada!',
            'class'=>'alert-danger'
        ]);

        return redirect()->route('jogo.index');

    }
}
