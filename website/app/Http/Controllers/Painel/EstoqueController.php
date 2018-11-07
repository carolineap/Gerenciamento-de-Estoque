<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstoqueController extends Controller
{
    public function index()
    {
        //$estoque = \App\Eventos::orderBy('data')->withCount('confirm')->get();
        $estoque = [];
        $produtos = \App\Produto::all();
        foreach ($produtos as $produto) {
            $aux = ['codProduto' => $produto->codProduto, 'limite' => $produto->limite,
                    'nomeProduto' => $produto->nomeProduto, 'fornecido' => $produto->fornecido,
                    'categoria' => $produto->categoria, 'marca' => $produto->marca];

            $itensProduto = \App\ItemProduto::where('codProduto', $produto->codProduto)
                                            ->where('quantidadeItem', '<=', $produto->limite)
                                            ->where('dataValidade', '<=', \Carbon\Carbon::now()->addWeek())
                                            ->orderBy('dataValidade')
                                            ->get();
            foreach ($itensProduto as $itemProduto) {
                $aux['dataValidade'] = $itemProduto->dataValidade;
                $aux['dataCompra'] = $itemProduto->dataCompra;
                $aux['quantidadeItem'] = $itemProduto->quantidadeItem;
                $aux['precoItem'] = $itemProduto->dataValidade;
                $aux['unidade'] = $itemProduto->unidade;

                array_push($estoque, $aux);
            }
        }
        return view('painel.estoque.index')->with(['estoque' => $estoque]);
    }

    public function create()
    {
        return view('painel.estoque.create');
    }

}
