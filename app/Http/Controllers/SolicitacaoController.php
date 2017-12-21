<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
<<<<<<< HEAD
=======
use App\Models\Servico;
>>>>>>> origin/marcelo
use App\Models\Setor;
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
<<<<<<< HEAD
        // Obter todos os setores
        $setores = Setor::all();

        return view ('solicitacao.create', compact('setores'));
=======

        // Obter todos os setores
        $setores = Setor::with('servicos')->get();
        $usuario = User::find(Auth::user()->id);

        //dd($setores->toJson());
        //dd($setores);
        return view ('solicitacao.create', compact('setores','usuario'));
>>>>>>> origin/marcelo
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Solicitacao::with(['endereco', 'solicitante', 'servico', 'servico.setor', 'comentarios', 'comentarios.funcionario', 'apoiadores'])->find($id);
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
        $solicitacao = Solicitacao::find($id);

        $usuario = User::find(Auth::user()->id);

        // Apenas permitir a exclusão de solicitações criadas pelo próprio usuário

        if($solicitacao->solicitante->id == $usuario->solicitante->id)
        {
            // Permitir a exclusão apenas se o Status for "Aberta" e a solicitação não tenha
            // nenhum comentário de funcionários da prefeitura

            if($solicitacao->status == "Aberta")
            {
                $solicitacao->delete();
                
                return "1";
            }
            elseif($solicitacao->status == "Fechada")
            {
                return "Sua solicitação não pôde ser excluída pois já foi Fechada pela Prefeitura";
            }
            else
            {
                return "Sua solicitação não pôde ser excluída pois já está sendo atendida pela Prefeitura";   
            }
        }
        else
        {
            // Vai se fuder
            return "0";
        }
    }


    public function minhassolicitacoes($id)
    {
        $solicitante_id = User::find($id)->solicitante->id;
        
        return $solicitacoes = Solicitacao::where('solicitante_id',$solicitante_id)->count();
    }

    public function batchSolicitacoes(Request $request)
    {
        // Decodando a string com todos os ids
        $solicitacoes = json_decode($request->solicitacoes);

        // Criando uma variável que vai conter todos os resultados e que será retornada para o javascript
        $retorno = [];

        // Iterar pelos ids e encontrar TODAS as informações da solicitação em questão e adicionar à variável
        // de retorno
        foreach($solicitacoes as $solicitacao)
        {
            $retorno[] = Solicitacao::with([
                'endereco', 
                'solicitante', 
                'servico', 
                'servico.setor',
                'servico.setor.secretaria',
                'comentarios',
                'comentarios.funcionario',
                'comentarios.funcionario.setor.secretaria',
                'apoiadores'
            ])->find($solicitacao->id);
        }

        //Adicionar as datas em formato humano
        foreach($retorno as $solicitacao){

            $solicitacao->data = $solicitacao->created_at->diffForHumans();

        }

        // CHUPA MARCELO, LEMBREI!
        return json_encode($retorno);
    }
}

