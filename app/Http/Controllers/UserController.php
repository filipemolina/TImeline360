<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Solicitante;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->user = $user; 
        
        // todas as rotas aqui serão antes autenticadas
        //$this->middleware('auth');
    }

  
    public function index()
    {
        // Mostrar a lista de usuários
        $usuarios = User::all();
        return $usuarios;
        //return view('usuarios.lista', compact('usuarios'));
    }


    
    public function create()
    {

/*        $titulo         = "Cadastro de Usuários";
        $tipo_acesso    = pegaValorEnum('users','acesso');                                                   
        
        sort($tipo_acesso);

        // return "entrou";
        return view('usuarios.create',compact(['titulo','tipo_acesso']));
*/    
    }

    
    public function store(Request $request)
    {        
        $this->validate($request, [
            'nome'                  => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users',
            'cpf'                   => 'cpf|unique:solicitantes',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'aceite'                => 'required'
        ]);

        // Cria um solicitante
        $solicitante = new Solicitante($request->all());
        $solicitante->save();

        $user = User::create($request->all());
        $user->password = bcrypt($request->password);
        
        // Associar user ao solicitante
        $user->solicitante()->associate($solicitante);
        $user->save();

        Auth::loginUsingId($user->id);

        return redirect(url('/'))->with('sucesso', 'Usuário cadastrado com sucesso.');
    }

    public function show($id)
    {
        
        $user = $this->user->find($id);

        //return view('user.show',compact('user');
        return $user;
    }


    public function edit($id)
    {
        $user = $this->user->find($id); 
       
        //return view('user.edit',compact('user'));
        return $user;
    }

    public function update(Request $request, $id)
    {
        // Validar
        $this->validate($request, [
            'nome'                  => 'required|max:255',
            'email'                 => 'required|email|max:255|unique:users,'.$id,
            'cpf'                   => 'cpf|unique:users,'.$id,
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        // Obter o usuário
        $usuario = User::find($id);

        // Atualizar as informações
        $status = $usuario->update($request->all());

        if ($status) {
            return redirect("/user/$usuario->id/edit")->with('sucesso', 'Informações do usuário atualizadas com sucesso.');
        } else {
            //return redirect(back); 
            return redirect("/user/$usuario->id/edit")->with(['erros' => 'Falha ao editar']);
        }
/*        $usuario = User::find($id);
        //$usuario = $this->users->find($id);

        $titulo         = "Edição de Usuários";
        $tipo_acesso    = pegaValorEnum('users','acesso');                                                   
        
        sort($tipo_acesso);
        //return "cheguei";
        return view('usuarios.edit',compact('usuario','titulo','tipo_acesso'));
*/    }


    public function destroy($id)
    {
        $user=User::find($id);

        $status_delecao=$user->delete();


        if ($status_delecao) {
            return redirect("/user/$usuario->id/edit")->with('sucesso', 'Usuário deletado com sucesso.');
        } else {
            //return redirect(back); 
            return redirect("/user/$usuario->id/edit")->with(['erros' => 'Falha ao deletar o usuário']);
        }
    }


    public function Senha()
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

    
        $escolaridades      = pegaValorEnum('solicitantes', 'escolaridade');                                                   
        $estados_civil      = pegaValorEnum('solicitantes', 'estado_civil'); 
        $sexos              = pegaValorEnum('solicitantes', 'sexo'); 
        $ufs                = pegaValorEnum('enderecos',    'uf'); 
        
        
        return view('auth.senha',compact('solicitante','escolaridades','estados_civil','sexos','ufs','fixo','celular'));
        
    }


}
