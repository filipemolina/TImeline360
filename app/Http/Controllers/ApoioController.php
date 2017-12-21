<?php

namespace App\Http\Controllers;

use App\Models\Apoio;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class ApoioController extends Controller
{

  	public function apoiar(Request $request)
   {
   	
   	$apoiado = Apoio::where('solicitacao_id', $request->solicitacao_id)->where('solicitante_id', $request->solicitante_id)->get();

   	if($apoiado->count())
		{
			$apoiado[0]->delete();
			
		}else{
			// Criar um novo apoio
			$apoio = new Apoio($request->all());
			$apoio->save();
		}   		

		// Contar quantos apoios já foram feitos
		$solicitacao = Solicitacao::find($request->solicitacao_id);
		return $solicitacao->apoiadores->count();
    }
}
