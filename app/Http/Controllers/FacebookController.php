<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Solicitante;

class FacebookController extends Controller
{
   public function login()
 	{
     	return Socialite::driver('facebook')->redirect();
 	}
 
 	public function pageFacebook()
 	{
     	$user_facebook = Socialite::driver('facebook')->user();

     	$existe_usuario = User::where('email', $user_facebook->getEmail())->get();

     	//dd($sistema);

     	if ($existe_usuario->count())
  		{

  			Auth::loginUsingId($existe_usuario[0]->id);

        	return redirect(url('/'));

		}else{

       	// Cria um solicitante
        	$solicitante = new Solicitante([
     		 	'nome'      => $user_facebook->getName(),
            'email'     => $user_facebook->getEmail(),
            'fb_uid'		=> $user_facebook->getId(),
            'password'  => bcrypt(time()),
            'foto'		=> 'data:image/jpg;base64,' . base64_encode(file_get_contents($user_facebook->getAvatar())),
        	]);

        	$solicitante->save();

        	$user = User::create([
        		'email'				=> $user->getEmail(),
        		'password'  		=> bcrypt(time()),
     		]);
        
        	// Associar user ao solicitante
        	$user->solicitante()->associate($solicitante);
        	$user->save();

        	Auth::loginUsingId($user->id);

        	return redirect(url('/'))->with('sucesso', 'Usuário cadastrado com sucesso.');
  		}
     
     	//return response()->json($user);
 	}
}
