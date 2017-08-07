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
//Auth::routes();
//Route::get('/home', 					'HomeController@index')->name('home');
//Route::get ('/logout', 					'Auth\LoginController@logout');

Route::get ('/login', 'AutenticaController@telaLogin');
Route::post ('/login', 'AutenticaController@login');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/registro', function () {
    return view('auth.register');
});




//resources
Route::resource('solicitante','SolicitanteController');
Route::resource('solicitacao','SolicitacaoController');
Route::resource('user', 'UserController');


