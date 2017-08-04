<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\models\User;

use Image;
use Datatables;
use PDF;

class UserController extends Controller
{
  

  
    public function index()
    {
/*         // Mostrar a lista de usuários

        
        $usuarios = User::all();

        return view('usuarios.lista', compact('usuarios'));
*/    }

    
    public function create()
    {

/*        $titulo         = "Cadastro de Usuários";
        $tipo_acesso    = pegaValorEnum('users','acesso');                                                   
        
        sort($tipo_acesso);

        // return "entrou";
        return view('usuarios.create',compact(['titulo','tipo_acesso']));
*/    }

    
    public function store(Request $request)
    {
        //dd($request->all());
/*
        $this->validate($request, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'acesso'    => 'required',
        ]);

        $user = User::create($request->all());

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect(url('usuarios/create'))->with('sucesso', 'Usuário cadastrado com sucesso.');
        //return redirect('lojas.edit')->whith(['erros' => 'Falha ao editar']); 
*/    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

/*        $usuario = User::find($id);
        //$usuario = $this->users->find($id);

        $titulo         = "Edição de Usuários";
        $tipo_acesso    = pegaValorEnum('users','acesso');                                                   
        
        sort($tipo_acesso);
        //return "cheguei";
        return view('usuarios.edit',compact('usuario','titulo','tipo_acesso'));
*/    }

    public function update(Request $request, $id)
    {
        // Validar

/*        $this->validate($request, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users,email,'.$id,
            'acesso'    => 'required',
        ]);

        // Obter o usuário

        $usuario = User::find($id);



        // Atualizar as informações

        $status = $usuario->update($request->all());


        
        

        if ($status) {
            return redirect("/usuarios/$usuario->id/edit")->with('sucesso', 'Informações do usuário atualizadas com sucesso.');
        } else {
            //return redirect(back); 
            return redirect("/usuarios/$usuario->id/edit")->with(['erros' => 'Falha ao editar']);
        }
*/        
    }

    public function destroy($id)
    {
/*        $user=User::find($id);

        $user->delete();
*/
    }



