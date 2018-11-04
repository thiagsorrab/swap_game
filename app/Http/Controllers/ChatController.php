<?php

/**
* Classe Controller Troca
*
**/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chat;

use App\Mensagem;

class ChatController extends Controller
{    
    public function chat($id){    	

    	$chat = Chat::where('troca_id', $id)->first();

    	if ($chat != null){

    		//dd($chat);

    		return view('chat.index', compact('chat'));
    		
    	} else {

    		$chat1 = [
    			'status'=>'Iniciado',
    			'troca_id'=>$id
    		];


    		$chat = Chat::create($chat1);

    		//dd($chat2);

    		return view('chat.index', compact('chat'));

    	}
        
    }  
    
    public function enviarmsg(Request $request)  {

    	$msg = $request->all();

    	Mensagem::create($msg);

    	return back();
    	//dd($request->all());

    }

}
