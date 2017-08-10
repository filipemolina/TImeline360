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
    	$solicitacoes = Solicitacao::orderBy('created_at', 'desc')->take(10)->get();

    	//dd($solicitacoes);
    	if (Auth::check()) {
    		$usuario =  User::find(Auth::user()->id);
		}
    	
    	
        return view('principal', compact('solicitacoes','usuario'));
    }
    
    public function minhassolicitacoes()
    {
   		$usuario =  User::find(Auth::user()->id);
    	$solicitacoes = Solicitacao::where('solicitante_id', $usuario->solicitante->id)->orderBy('created_at', 'desc')->take(10)->get();
        return view('principal', compact('solicitacoes','usuario'));
    }
    
}
