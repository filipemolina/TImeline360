<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
           return redirect("/");
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
