<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Solicitante;
use App\Models\Endereco;
use App\Models\Telefone;




class SolicitanteController extends Controller
{
    public function __construct(Solicitante $solicitante)
    {
//        $this->solicitante = $solicitante; 
        
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

     //
    }


    public function show($id)
    {



    }

    public function edit($id)
    {
        //

    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $this->validate($request, [
            'nome'                  => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:solicitantes,email,'.$id,
            'cpf'                   => 'cpf|unique:solicitantes,cpf,'.$id,
            'nascimento'            => 'date',
            'sexo'                  => 'required',

        ]);


        // solcaliza o solicitante
        $solicitante = Solicitante::find($id);

        $solicitante->update($request->all());

        if($request->has('endereco')) 
        {
            $solicitante->endereco->update($request->endereco);
        }else{
            $endereco = new Endereco($request->all());
            $endereco->solicitante()->associate($solicitante);
            $endereco->save(); 
        }

        //deleta os telefones para serem inseridos os quem vem do formulário
        $telefones = Telefone::where("solicitante_id", $solicitante->id);
        $telefones->delete();

        
        // Cria um novo telefone com as informações inseridas
        foreach($request->telefones as $telefone)
        {
            //testa se o telefone foi preenchido no formulario
            //ser for, cadastra, senão, passa para o próximo numero
            if( $telefone['numero'] )
            {
                // Criar um novo telefone com as informações inseridas
                $solicitante->telefones()->save(new Telefone($telefone));    
            }
            
        }

        
    
      
        return redirect(url('/'))->with('sucesso', 'Informações do Solicitante alteradas com sucesso.');    

    }

    public function destroy($id)
    {
        //
    }


    //==================================================================================
    //             PERFIL    
    //==================================================================================

    public function Perfil()
    {

        $usuario = User::find(Auth::user()->id);
        $solicitante = $usuario->solicitante; 
        
        //verifica se o solicitante já possui endereço cadastrado, se não possuir cria 
        if( ! $usuario->solicitante->endereco)
        {
            $solicitante->endereco = new Endereco();
        };

        $fixo       ="";
        $celular    ="";

        foreach($solicitante->telefones as $telefone)
        {
            
            if( $telefone['tipo_telefone'] == 'Fixo' )
            {
                $fixo = $telefone['numero'];
                
            };

            if( $telefone['tipo_telefone'] == 'Celular' )
            {
              $celular = $telefone['numero'];
              
            };
            
        }

        
        
        


        //verifica se o solicitante já possui telefone cadastrado, se não possuir cria 
        /*if( ! $usuario->solicitante->telefone)
        {
            $solicitante->telefone = new Telefone();
        };
        */
    
        $escolaridades      = pegaValorEnum('solicitantes', 'escolaridade');                                                   
        $estados_civil      = pegaValorEnum('solicitantes', 'estado_civil'); 
        $sexos              = pegaValorEnum('solicitantes', 'sexo'); 
        $ufs                = pegaValorEnum('enderecos',    'uf'); 
        
        
        return view('solicitantes.edit',compact('solicitante','escolaridades','estados_civil','sexos','ufs','fixo','celular'));
        
    }

}
