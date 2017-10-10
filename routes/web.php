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

//Autenticação pelo Facebook
Route::get('loginFacebook', 'FacebookController@login');
Route::get('facebook', 'FacebookController@pageFacebook');

/*Route::get('loginFacebook/callback', 	'FacebookController@callback');*/

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


//mostra um mapa com as solicitações marcadas
Route::get ('/mapa', 			'PrincipalController@mapa');
/*Route::get ('/mapamesquita', 	'PrincipalController@mapamesquita');*/


Route::get('/registro', function () {
    return view('auth.register');
});

///////////////////////////// Rotas para Ajax
Route::get("/solicitacoes/minhas/{id}", "SolicitacaoController@minhassolicitacoes");

Route::post("/apoiar", 						"ApoioController@apoiar");
Route::get ('/pesquisa',               "PrincipalController@pesquisa");
Route::post('/batchsolicitacoes',      "SolicitacaoController@batchSolicitacoes");


//resources
Route::resource('solicitante',	'SolicitanteController');
Route::resource('solicitacao',	'SolicitacaoController');
Route::resource('comentario',		'ComentarioController');
Route::resource('user', 			'UserController');


