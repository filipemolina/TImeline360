<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Solicitante;
use App\Models\User;

class MensagemController extends Controller
{
    public function __construct(Mensagem $mensagem)
    {
        $this->mensagem = $mensagem; 
        $this->middleware('auth');
    }
    

    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
       // Validar

        $this->validate($request, [
            'mensagem'       => 'required|min:2',
            'solicitacao_id' => 'required'
        ]);

        $mensagem = new Mensagem($request->all());

        $mensagem->solicitacao_id = $request->solicitacao_id;

        $mensagem->save();

        return json_encode("ok");

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
