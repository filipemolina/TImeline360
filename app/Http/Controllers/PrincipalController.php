<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Solicitante;
use App\Models\Endereco;
use App\Models\User;
use Carbon\Carbon;

class PrincipalController extends Controller
{
    // Número de solicitações a serem exibidas à qualquer momento em qualquer página do sistema
    // em qualquer galáxia também.
    private $itens_por_pagina = 10;

	public function __construct()
    {
        $this->middleware('auth', ['except' => array('index')]);
    }


	public function index()
    {
        $cabon = new Carbon();

        if( Solicitacao::count() > 0)
        {
        	if (Auth::check()) {
                //carrega as ultimas solicitações que JÁ ESTÃO moderadas e TODAS as do usuário logado

        		$usuario      =  User::find(Auth::user()->id);

                $solicitacoes = Solicitacao::withCount('apoiadores')
                                            ->withCount('comentarios')
                                            ->with('endereco')
                                            ->where('moderado', 1)
                                            ->orWhere("solicitante_id", $usuario->solicitante->id)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate($this->itens_por_pagina);
                
                $meus_apoios        = $usuario->solicitante->apoios;
                $meus_apoios_ids    = [];
                
                foreach ($meus_apoios as $apoio) 
                {
                    $meus_apoios_ids[] = $apoio->id;
                }

                //dd($meus_apoios_ids);
                return view('principal', compact('solicitacoes','usuario','meus_apoios_ids'));

            }else{
                //carrega as ultimas 10 solicitações que JÁ ESTÃO moderadas
                $solicitacoes = Solicitacao::withCount('apoiadores')
                                            ->where('moderado', 1)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate($this->itens_por_pagina);

                return view('principal', compact('solicitacoes'));
    		}
        }else{
            dd("Nenhuma solicitação cadastrada");
        }
    }
    

    public function minhassolicitacoes()
    {
   		$usuario =  User::find(Auth::user()->id);

        //carrega as solicitações do usuário logado MODERADA ou NÃO
    	$solicitacoes = Solicitacao::withCount('comentarios')->where('solicitante_id', $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate($this->itens_por_pagina);

        if($solicitacoes->total() > 0)
        {

            $meus_apoios        = $usuario->solicitante->apoios;
            $meus_apoios_ids    = [];
            
            foreach ($meus_apoios as $apoio) 
            {
                $meus_apoios_ids[] = $apoio->id;
            }
            return view('principal', compact('solicitacoes','usuario','meus_apoios_ids'));    
        }else{

            $solicitacoes = Solicitacao::withCount('comentarios')->where('moderado', 1)->orWhere("solicitante_id", $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate($this->itens_por_pagina);

            return view('principal', compact('solicitacoes','usuario'))->withErrors(['erros' => 'Você não possui Solicitações cadastradas!']);    
        }
    }

    /**
     * Função ajax que retorna solicitações que combinem com o termo de pesquisa
     */

    public function pesquisa(Request $request)
    {
        // $solicitacoes = Solicitacao::where('solicitante.nome', 'like', "%".trim($request->termo)."%")
        // ->orWhere('setores.nome', 'like', "%".trim($request->termo)."%")
        // ->orWhere('enderecos.logradouro', 'like', "%".trim($request->termo)."%")
        // ->orWhere('enderecos.bairro', 'like', "%".trim($request->termo)."%")
        // ->orWhere('enderecos.cep', 'like', "%".trim($request->termo)."%")
        // ->paginate($this->itens_por_pagina);

        $dados = "%".trim($request->termo)."%";

        $solicitacoes = Solicitacao::withCount('comentarios')

        // Filtar por propriedades de Models relacionados
        ->whereHas('solicitante', function($q) use ($dados){

            $q->where('nome', 'like', $dados);

        })
        ->orWhereHas('endereco', function($q) use ($dados){

            $q->where('logradouro', 'like', $dados)
              ->orWhere('bairro', 'like', $dados)
              ->orWhere('cep', 'like', $dados);

        })
        ->orWhereHas('servico', function($q) use ($dados){

            $q->where("nome", 'like', $dados);

        })
        ->orderBy('created_at', 'desc')
        ->paginate($this->itens_por_pagina);

        // Obter o usuário logado atualmente
        $usuario      =  User::find(Auth::user()->id);

        // Criar um vetor que guarda todos os ids das solicitações apoiadas por esse usuário
        $meus_apoios        = $usuario->solicitante->apoios;
        $meus_apoios_ids    = [];
        
        foreach ($meus_apoios as $apoio) 
        {
            $meus_apoios_ids[] = $apoio->id;
        }

        return view('principal', compact('solicitacoes', 'meus_apoios_ids', 'usuario'));
    }

    public function pesquisaAjax(Request $request)
    {
        $solicitacoes = DB::table('solicitacoes')
            ->join('solicitantes', 'solicitacoes.solicitante_id', '=', 'solicitantes.id')
            ->join('servicos', 'solicitacoes.servico_id', '=', 'servicos.id')
            ->join('setores', 'servicos.setor_id', '=', 'setores.id')
            ->join('enderecos', 'solicitacoes.id', '=', 'enderecos.solicitacao_id')
            ->select('solicitacoes.id')
            ->where('solicitantes.nome', 'like', "%".trim($request->termo)."%")
            ->orWhere('setores.nome', 'like', "%".trim($request->termo)."%")
            ->orWhere('enderecos.logradouro', 'like', "%".trim($request->termo)."%")
            ->orWhere('enderecos.bairro', 'like', "%".trim($request->termo)."%")
            ->orWhere('enderecos.cep', 'like', "%".trim($request->termo)."%")
            ->get();
    }
}



