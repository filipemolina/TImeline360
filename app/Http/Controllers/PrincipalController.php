<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Solicitante;
use App\Models\User;
use App\Models\Endereco;
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
                                            ->paginate();
                
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
    	$solicitacoes = Solicitacao::where('solicitante_id', $usuario->solicitante->id)->orderBy('created_at', 'desc')->paginate(10);

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
}



