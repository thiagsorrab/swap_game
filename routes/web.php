<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Rota para a tela de login do sistema
Route::get('/login',['uses'=>'AutenticacaoController@login', 'as'=>'login']);

//Rota post para validar o login
Route::post('/logar',['uses'=>'AutenticacaoController@logar', 'as'=>'logar']);

//Rota para a tela de registar novo usuario.
Route::get('/registrar', ['uses'=>'UsuarioController@registrar', 'as'=>'usuario.registrar']);

//Rota post para salvar novo usuario no banco de dados
Route::post('/usuario/salvar', ['uses'=>'UsuarioController@salvar', 'as'=>'usuario.salvar']);

//Rotas para que precição de autenticação para serem acessadas
Route::middleware(['auth'])->group(function(){

	//Rota raiz do sistema, se tentar entrar nela sem logar, ele vai para a tela de login
	Route::get('/', function () {
	    return view('welcome');
	})->name('home');

	//Rota Inicial do usuario normal
	Route::get('/sistema', ['uses'=>'UsuarioController@normal', 'as'=>'usuario.normal']);

	//Rota Inicial do usuario administrador
	Route::get('/adminsistema', ['uses'=>'UsuarioController@admin', 'as'=>'usuario.admin']);

	//Rota com a lista de usuarios 
	Route::get('/usuario', ['uses'=>'UsuarioController@index', 'as'=>'usuario.index']);

	//Rota para adicionar novo usuario
	Route::get('/usuario/adicionar', ['uses'=>'UsuarioController@adicionar', 'as'=>'usuario.adicionar']);

	//Rota para tela de edição de usuario
	Route::get('/usuario/editar/{id}', ['uses'=>'UsuarioController@editar', 'as'=>'usuario.editar']);

	//Rota para validar a edição do usuario e gravar no banco de dados
	Route::put('/usuario/atualizar/{id}', ['uses'=>'UsuarioController@atualizar', 'as'=>'usuario.atualizar']);

	//Rota para deletar um usuario
	Route::get('/usuario/deletar/{id}', ['uses'=>'UsuarioController@deletar', 'as'=>'usuario.deletar']);

	//Rota para sair do sistema
	Route::get('/logout', ['uses'=>'AutenticacaoController@logout', 'as'=>'logout']);

	//Rota para a lista de consoles
	Route::get('/console',['uses'=>'ConsoleController@index', 'as'=>'console.index']);

	//Rota a tela de adicionar um novo console
	Route::get('/console/adicionar', ['uses'=>'ConsoleController@adicionar', 'as'=>'console.adicionar']);

	//Rota para validar e salvar no banco um novo console
	Route::post('/console/salvar', ['uses'=>'ConsoleController@salvar', 'as'=>'console.salvar']);

	//Rota para tela de edição de um console
	Route::get('/console/editar/{id}', ['uses'=>'ConsoleController@editar', 'as'=>'console.editar']);

	//Rota para validar e editar um console no banco de dados
	Route::put('/console/atualizar/{id}', ['uses'=>'ConsoleController@atualizar', 'as'=>'console.atualizar']);

	//Rota para deletar um console 
	Route::get('/console/deletar/{id}', ['uses'=>'ConsoleController@deletar', 'as'=>'console.deletar']);

	//Rota com todos os jogos já cadastrados pelo usuario.
	Route::get('/meusjogos',['uses'=>'JogoController@meusjogos', 'as'=>'jogo.meusjogos']);

	//Rota com a lista de todos os jogos cadastrados no sistema
	Route::get('/jogo',['uses'=>'JogoController@index', 'as'=>'jogo.index']);

	//Rota para a tela de adicionar um novo jogo
	Route::get('/jogo/adicionar', ['uses'=>'JogoController@adicionar', 'as'=>'jogo.adicionar']);

	//Rota para validar e salvar um novo jogo no banco
	Route::post('/jogo/salvar', ['uses'=>'JogoController@salvar', 'as'=>'jogo.salvar']);

	//Rota para tela de edição do jogo
	Route::get('/jogo/editar/{id}', ['uses'=>'JogoController@editar', 'as'=>'jogo.editar']);

	//Rota para validar e editar um jogo
	Route::put('/jogo/atualizar/{id}', ['uses'=>'JogoController@atualizar', 'as'=>'jogo.atualizar']);

	//Rota para deletar um jogo
	Route::get('/jogo/deletar/{id}', ['uses'=>'JogoController@deletar', 'as'=>'jogo.deletar']);

	//Rota para a tela de troca de um jogo
	Route::get('/troca/jogo/{id}', ['uses'=>'TrocaController@index', 'as'=>'troca.index']);

	//Rota para iniciar o pedido de troca 
	Route::post('/troca/inicio', ['uses'=>'TrocaController@inicio', 'as'=>'troca.inicio']);

	//Rota para tela das trocas do usuario
	Route::get('/troca', ['uses'=>'TrocaController@lista', 'as'=>'troca.lista']);

	//Rota para aceitar a troca e filizar
	Route::put('/troca/realiza/{id}', ['uses'=>'TrocaController@realiza', 'as'=>'troca.realiza']);

	//Rota para Recusar a troca.
	Route::put('/troca/recusa/{id}', ['uses'=>'TrocaController@recusa', 'as'=>'troca.recusa']);

	//Rota para chat
	Route::get('/troca/chat/{id}', ['uses'=>'ChatController@chat', 'as'=>'chat.chat']);

	//Rota para enviar mensagem
	Route::post('/chat/enviar', ['uses'=>'ChatController@enviarmsg', 'as'=>'chat.enviar']);

	//Rota para tela de avaliacao
	Route::get('/avaliar/troca/{id}', ['uses'=>'AvaliacaoController@index', 'as'=>'avaliacao.index']);

	//Rota para tela de avaliacao
	Route::post('/avaliar/salvar', ['uses'=>'AvaliacaoController@salvar', 'as'=>'avaliacao.salvar']);

	Route::put('/avaliar/atualizar/{id}', ['uses'=>'AvaliacaoController@atualizar', 'as'=>'avaliacao.atualizar']);

});





