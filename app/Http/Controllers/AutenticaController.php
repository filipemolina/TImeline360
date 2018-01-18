<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitante;
use App\Models\Funcionario;
use App\Models\User;

class AutenticaController extends Controller
{
   
   public function telaLogin()
   {
      return view("auth.login");
   }

   public function login(Request $request)
   {
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
      {
         // verifica se foi efetuado o login por um FUNCIONARIO DO GESOL
         // que ainda não tem cadastro aqui no 360
         $usuario = User::where('email', $request->email)->first();

         //dd($usuario->funcionario);
         if($usuario->solicitante_id)
         {
            //possui cadastro aqui
            return redirect("/");
         }else{
            //não possui cadastro. cria um SO9LICITANTE_ID para ele


            // Cria um solicitante
            $solicitante = new Solicitante([
               'nome'   => $usuario->funcionario->nome,
               'email'  => $usuario->email,
               'cpf'    => $usuario->funcionario->cpf,
            ]);
            $solicitante->save();

            // Associar usuario ao solicitante
            $usuario->solicitante()->associate($solicitante);
            $usuario->save();

            //libera o acesso
            return redirect("/");
         }
      } else {
         //return redirect("/login")->with('erros');
         //return redirect("/user/$usuario->id/edit")->with(['erros' => 'Falha ao editar']);

         $existe_email = User::where('email', $request->email)->count();
         if ($existe_email > 0) {
             return redirect("/login")->withErrors(['erros' => 'Senha não confere']);
         } else {
             return redirect("/login")->withErrors(['erros' => 'Email não cadastrado']);
         }
      }
   }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
