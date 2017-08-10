<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Solicitante;
use App\Models\User;

class PrincipalController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['except' => array('index')]);
    }


	public function index()
    {
        
    	if (Auth::check()) {
            //carrega as ultimas 10 solicitações que JÁ ESTÃO moderadas e TODAS as do usuário logado
    		$usuario =  User::find(Auth::user()->id);
            $solicitacoes = Solicitacao::where('moderado', 1)->orWhere("solicitante_id", $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate(5);
        }else{
            //carrega as ultimas 10 solicitações que JÁ ESTÃO moderadas
            $solicitacoes = Solicitacao::where('moderado', 1)->orderBy('created_at', 'desc')->paginate(5);
		}
    	
    	
        return view('principal', compact('solicitacoes','usuario'));
    }
    
    public function minhassolicitacoes()
    {
   		$usuario =  User::find(Auth::user()->id);

        //carrega as solicitações do usuário logado MODERADA ou NÃO
    	$solicitacoes = Solicitacao::where('solicitante_id', $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('principal', compact('solicitacoes','usuario'));
    }
    
}
