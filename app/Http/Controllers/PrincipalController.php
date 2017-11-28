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
        $this->middleware('auth', ['except' => array('index','pesquisa','mapa')]);
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

        $dados = "%".trim($request->termo)."%";

       	// Buscar por nome do solicitante
       	
       	$solicitacoes = Solicitacao::with(['endereco', 'servico', 'solicitante'])

			->where('moderado', 1)

			// Agrupar as próximas condições em parênteses
			
			->where(function($query) use ($dados){

				$query->whereHas('solicitante', function($q) use ($dados){

					$q->where('nome', 'like', $dados);

				})->orWhereHas('endereco', function($q2) use ($dados){

					$q2->where('logradouro', 'like', $dados);

				})->orWhereHas('endereco', function($q2) use ($dados){

					$q2->where('bairro', 'like', $dados);

				})->orWhereHas('endereco', function($q2) use ($dados){

					$q2->where('cep', 'like', $dados);

				})->orWhereHas('servico', function($q2) use ($dados){

					$q2->where('nome', 'like', $dados);

				});

			})

			// Paginar e Ordenar

			->orderBy('created_at', 'desc')
			->paginate($this->itens_por_pagina);


        //se estiver logado
        if (Auth::check()) {
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
        }else{
            return view('principal', compact('solicitacoes'));
        }
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

    public function mapa()
    {

        $solicitacoes = Solicitacao::with(['servico.setor.secretaria.endereco'])->get();

        
        if (Auth::check()) {
            // Obter o usuário logado atualmente
            $usuario      =  User::find(Auth::user()->id);
            return view('mapa.mapa', ['solicitacoes' => $solicitacoes, 'usuario' => $usuario ]);
        }else{
            return view('mapa.mapa', ['solicitacoes' => $solicitacoes]);
        }    

    }


  	// Tornar um array multidimensional único

  	function unique_multidim_array($array, $key) { 
	    $temp_array = array(); 
	    $i = 0; 
	    $key_array = array(); 
	    
	    foreach($array as $val) { 
	        if (!in_array($val[$key], $key_array)) { 
	            $key_array[$i] = $val[$key]; 
	            $temp_array[$i] = $val; 
	        } 
	        $i++; 
	    } 
	    return $temp_array; 
	} 

}



