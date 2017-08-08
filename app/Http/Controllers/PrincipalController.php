<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;

class PrincipalController extends Controller
{
	 public function index()
    {
    	$solicitacoes = Solicitacao::orderBy('created_at', 'desc')->take(10)->get();

    	//dd($solicitacoes);
        return view('principal', compact('solicitacoes'));
    }
    
}
