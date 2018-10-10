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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuario', ['uses'=>'UsuarioController@index', 'as'=>'usuario.index']);

Route::get('/usuario/adicionar', ['uses'=>'UsuarioController@adicionar', 'as'=>'usuario.adicionar']);

Route::post('/usuario/salvar', ['uses'=>'UsuarioController@salvar', 'as'=>'usuario.salvar']);

Route::get('/usuario/editar/{id}', ['uses'=>'UsuarioController@editar', 'as'=>'usuario.editar']);

Route::put('/usuario/atualizar/{id}', ['uses'=>'UsuarioController@atualizar', 'as'=>'usuario.atualizar']);