<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\User;

class PrincipalController extends Controller
{
	 public function index()
    {
    	$solicitacoes = Solicitacao::orderBy('created_at', 'desc')->take(10)->get();

    	//dd($solicitacoes);
    	if (Auth::check()) {
    		$usuario =  User::find(Auth::user()->id);
		}
    	
    	
        return view('principal', compact('solicitacoes','usuario'));
    }
    
}
