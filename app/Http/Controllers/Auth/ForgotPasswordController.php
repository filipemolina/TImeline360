<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\Solicitante;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validateEmail(Request $request)
    {
        $quem = User::where('email', $request->email)->first();

        if($quem){
            $request->merge(['solicitante_id' => $quem->solicitante_id]);
        }

        $this->validate($request, [
            'email' => 'required|email',
            'solicitante_id' => 'required'
        ],[
            'solicitante_id.required' => "Esse endereço de e-mail não está cadastrado no Mesquita 360."
        ]);
    }
}
