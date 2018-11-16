<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class receitasController extends Controller
{
    public function index()
    {
        $receitas = \App\Receita::all();
        return view('painel.receitas.index')->with('receitas', $receitas);
    }

    public function create()
    {
        return view('painel.receitas.create');
    }

    public function ajaxBuscaReceita(Request $request){
        $receitas = [];

        if($request->buscaOp=='nome')
            $receitas = \App\Receita::where('nomePrato', $request->search)->orderBy('codPrato')->get();
        else if($request->buscaOp=='codigo')
            $receitas = \App\Receita::where('codPrato', $request->search)->get();

        return response()->json($receitas);
    }

}
