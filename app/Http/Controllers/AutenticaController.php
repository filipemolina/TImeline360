<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticaController extends Controller
{
   
    public function telaLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $request->email;
        $request->senha;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->senha]))
        {



        } else {

            return redirect("/login")->with();

        }
    }

    public function logout()
    {
        Auth::logout();
    }

}
