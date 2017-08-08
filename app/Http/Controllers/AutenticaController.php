<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            return redirect("/login")->with('erros');
            //return redirect("/user/$usuario->id/edit")->with(['erros' => 'Falha ao editar']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
