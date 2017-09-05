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
                                            ->with('endereco')
                                            ->where('moderado', 1)
                                            ->orWhere("solicitante_id", $usuario->solicitante->id)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(3);
                
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
                                            ->paginate(5);

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
    	$solicitacoes = Solicitacao::where('solicitante_id', $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate(2);

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
            $solicitacoes = Solicitacao::where('moderado', 1)->orWhere("solicitante_id", $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate(10);

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
        // ->paginate(10);

        $dados = "%".trim($request->termo)."%";

        $solicitacoes = Solicitacao::whereHas('solicitante', function($q) use ($dados){

            $q->where('nome', 'like', $dados);

        })->paginate(10);

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



