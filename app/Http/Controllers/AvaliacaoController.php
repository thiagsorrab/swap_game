<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Avaliacao;
use App\Troca;

class AvaliacaoController extends Controller
{
    public function index($id){

    	$avaliacao = Avaliacao::where('troca_id', $id)->first();

    	if ($avaliacao != null){    		

    		//dd($avaliacao);

    		return view('avaliacao.editar', compact('avaliacao'));
    		
    	} else {

    		Auth::user()->id;
    		$troca = Troca::find($id);
    		//dd(Auth::user()->id);

    		if (Auth::user()->id == $troca->usuario_id1){
    			$troca->usuario_avaliado = $troca->usuario_id2;
    		}

    		if (Auth::user()->id == $troca->usuario_id2){
    			$troca->usuario_avaliado = $troca->usuario_id1;
    		}

    		

    		//dd($troca);
    		return view('avaliacao.index',compact('troca'));

    	}

    }

    public function salvar(Request $request){

    	Avaliacao::create($request->all());

    	\Session::flash('flash_message', [
    		'msg'=>'Avaliação feita com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('home');

    }

    public function atualizar(Request $request, $id){  
    	Avaliacao::find($id)->update($request->all());

    	\Session::flash('flash_message', [
    		'msg'=>'Avaliação atualizada com Sucesso!',
    		'class'=>'alert-success'
    	]);

    	return redirect()->route('home');

    }

}
