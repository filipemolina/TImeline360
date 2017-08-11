<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Solicitante;



class SolicitanteController extends Controller
{
    public function __construct(Solicitante $solicitante)
    {
        $this->solicitante = $solicitante; 
        
        // todas as rotas aqui serão antes autenticadas
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
        //        return $request->all();
    }

    public function show($id)
    {



    }

    public function edit($id)
    {
        $solicitante = $this->solicitante->find($id);
        

        return view('solicitantes.edit',compact('solicitante'));

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    //==================================================================================
    //             PERFIL    
    //==================================================================================

    public function telaPerfil()
    {

        $usuario = User::find(Auth::user()->id);
        $solicitante = $usuario->solicitante;

        
    
        //dd($solicitante);
        $escolaridades      = pegaValorEnum('solicitantes','escolaridade');                                                   
        $estados_civil      = pegaValorEnum('solicitantes','estado_civil'); 
        $sexos              = pegaValorEnum('solicitantes','sexo'); 
        $tipos_telefone     = pegaValorEnum('telefones','tipo_telefone'); 
        
        
        

        



        return view('solicitantes.edit',compact('solicitante','escolaridades','estados_civil','sexos','tipos_telefone'));
        
    }

}
