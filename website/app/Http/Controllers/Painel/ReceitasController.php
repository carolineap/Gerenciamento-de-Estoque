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
        $unidades = \App\Unidade::all();
        $produtos = \App\Produto::all();
        return view('painel.receitas.create')->with(['unidades' => $unidades, 'produtos' => $produtos]);
    }

    public function store(Request $request){
        $data = ['nomePrato' => $request->nome, 'precoPrato' => $request->preco, 'quantidadePessoas' => $request->quntPessoas];

        $receita = \App\Receita::create($data);

        $i = 0;

        while(isset($request['codIngrediente'.$i])){
            $data = ['codPrato' => $receita->codPrato, 'codProduto' => $request['codIngrediente'.$i], 'quantidadeProduto' => $request['quntIngrediente'.$i], 'unidade' => $request['unidade'.$i]];
            \App\ItemPrato::create($data);
            $i++;
        }

        return redirect()->route('receitas.index');
    }

    public function ajaxBuscaReceita(Request $request){
        $receitas = [];

        if($request->buscaOp=='nome')
            $receitas = \App\Receita::where('nomePrato', $request->search)->orderBy('codPrato')->get();
        else if($request->buscaOp=='codigo')
            $receitas = \App\Receita::where('codPrato', $request->search)->get();

        return response()->json($receitas);
    }

    public function ajaxInfoReceita(Request $request){
        $listaReceitas = json_decode($request->listaReceitas);

        $resp = [];

        foreach($listaReceitas as $receita){
            $itensPrato = \App\ItemPrato::where('codPrato', $receita->codigo)->get();

            foreach($itensPrato as $itemPrato){
                $produto = \App\Produto::where('codProduto', $itemPrato->codProduto)->first();

                $itensProduto = \App\ItemProduto::where('codProduto', $itemPrato->codProduto)
                                                ->where('unidade', $itemPrato->unidade)
                                                ->get();

                $total = 0;

                foreach($itensProduto as $itemProduto){
                    $total+=$itemProduto->quantidadeItem;
                }

                if(!isset($resp[$produto->nomeProduto])){
                    $resp[$produto->nomeProduto] = [];
                }
                if(!isset($resp[$produto->nomeProduto][$itemPrato->unidade])){
                    $resp[$produto->nomeProduto][$itemPrato->unidade] = [];
                    $resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeProduto'] = $receita->quntReceitas*$itemPrato->quantidadeProduto;
                    $resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeItem'] = $total;
                    $resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeFaltando'] = ($resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeProduto']-$resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeItem']>0?$resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeProduto']-$resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeItem']:0);
                }
                else{
                    $resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeProduto'] += $receita->quntReceitas*$itemPrato->quantidadeProduto;
                    $resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeFaltando'] = ($resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeProduto']-$resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeItem']>0?$resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeProduto']-$resp[$produto->nomeProduto][$itemPrato->unidade]['quantidadeItem']:0);
                }
            }
        }

        return response()->json($resp);
    }

}
