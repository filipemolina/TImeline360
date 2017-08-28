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


// Rotas da autenticação

//Route::get ('/login', 'AutenticaController@telaLogin');
Route::get('login', ['as' => 'login', 'uses' => 'AutenticaController@telaLogin']);

Route::post ('/login', 	'AutenticaController@login');
Route::get  ('/logout', 'AutenticaController@logout');

//index do site
Route::get ('/', ['as' => 'index', 'uses' => 'PrincipalController@index']);

//caminho para a tela de alteração do perfil do Solicitante
Route::get  ('/perfil', 'SolicitanteController@Perfil');

//caminho para a tela de alteração de senha
Route::get 	('/senha',			'UserController@AlteraSenha');
Route::put 	('/salva',   		'UserController@SalvarSenha');

//Route::get 	('/senha',	'UserController@Senha');

//filtra para mostrar apenas as solicitações do usuário logado
Route::get ('/minhassolicitacoes', 'PrincipalController@minhassolicitacoes');


Route::get('/registro', function () {
    return view('auth.register');
});

///////////////////////////// Rotas para Ajax
Route::get("/solicitacoes/minhas/{id}", "SolicitacaoController@minhassolicitacoes");

Route::post("/apoiar", 						"ApoioController@apoiar");



//resources
Route::resource('solicitante',	'SolicitanteController');
Route::resource('solicitacao',	'SolicitacaoController');
Route::resource('comentario',		'ComentarioController');
Route::resource('user', 			'UserController');


