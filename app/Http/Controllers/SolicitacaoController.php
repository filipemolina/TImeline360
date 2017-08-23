<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\User;

class SolicitacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    public function minhassolicitacoes($id)
    {
        $solicitante_id = User::find($id)->solicitante->id;
        
        return $solicitacoes = Solicitacao::where('solicitante_id',$solicitante_id)->count();
    }
}
