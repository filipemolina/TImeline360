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



Route::get  ('/perfil', 'SolicitanteController@Perfil');

/*Route::get  ('/senha', 	'SolicitanteController@telaSenha');
Route::post ('/senha', 	'SolicitanteController@Senha');
*/


Route::get ('/', 'PrincipalController@index');
Route::get ('/minhassolicitacoes', 'PrincipalController@minhassolicitacoes');

/*
Route::get('/', function () {
    return view('principal');
});*/


Route::get('/registro', function () {
    return view('auth.register');
});



//resources
Route::resource('solicitante',	'SolicitanteController');
Route::resource('solicitacao',	'SolicitacaoController');
Route::resource('mensagem',		'MensagemController');
Route::resource('user', 			'UserController');


