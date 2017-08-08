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
      
      //dd($request->all());

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {

            
           return redirect("/");

        } else {

            return redirect("/login")->with('erros');
            //return redirect("/user/$usuario->id/edit")->with(['erros' => 'Falha ao editar']);
        }


  /*      $email = $request->email;

        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->intended('dashboard');
        }else{
            return "erro";
        }*/

    }


    public function logout()
    {
        //dd("entrei");
        Auth::logout();
        return redirect("/");
    }

}
