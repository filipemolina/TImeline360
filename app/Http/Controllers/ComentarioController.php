<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Solicitante;
use App\Models\Comentario;
use App\Models\User;

class ComentarioController extends Controller
{
    public function __construct(Comentario $Comentario)
    {
        $this->Comentario = $Comentario; 
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
            'comentario'       => 'required|min:2',
            'solicitacao_id'    => 'required'
        ]);

        $Comentario = new Comentario($request->all());

        $Comentario->solicitacao_id = $request->solicitacao_id;

        $Comentario->save();

        return $Comentario->id;

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
        // $comentario = Comentario::find($id);

        // $contador = Comentario::where([
        //     ['solicitacao_id', $comentario->solicitacao_id],
        //     ['created_at', '>', $comentario->created_at],
        // ])->whereNotNull('funcionario_id')->count();

        // if($contador > 0){
        //     return "0";
        // }
        // else{
        //     $comentario->delete();
        //     return "1";
        // }

        $comentario = Comentario::find($id);

        $comentario->comentario = "'COMENTÁRIO EXCLUÍDO PELO USUÁRIO!'";
        $comentario->apagado = true;
        $comentario->save();
    }
}
