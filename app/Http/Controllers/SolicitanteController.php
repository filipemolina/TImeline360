<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use App\Models\User;

use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function __construct(Solicitante $solicitante)
    {
        $this->solicitante = $solicitante; 
        
        // todas as rotas aqui serão antes autenticadas
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
        //        return $request->all();
    }

    public function show($id)
    {



    }

    public function edit($id)
    {
        $solicitante = $this->solicitante->find($id);
        
        dd($solicitante);

        //return view('solicitantes.edit',compact('solicitante'));

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
