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
                $aux['precoItem'] = $itemProduto->precoItem;
                $aux['unidade'] = $itemProduto->unidade;

                array_push($estoque, $aux);
            }
        }
        return view('painel.estoque.index')->with(['estoque' => $estoque]);
    }

    public function ajaxBuscaProduto(Request $request){
        $estoque = [];

        if($request->buscaOp=='nome')
            $produtos = \App\Produto::where('nomeProduto', $request->search)->orderBy('codProduto')->get();
        else if($request->buscaOp=='codigo')
            $produtos = \App\Produto::where('codProduto', $request->search)->get();
        else if($request->buscaOp=='categoria')
            $produtos = \App\Produto::where('categoria', $request->search)->orderBy('codProduto')->get();
        else
            $itensProduto = \App\ItemProduto::where('dataCompra', $request->search)->orderBy('dataCompra')->orderBy('codProduto')->get();

        if($request->buscaOp=='data'){
            foreach ($itensProduto as $itemProduto) {
                $aux = ['codProduto' => $itemProduto->codProduto, 'dataValidade' => $itemProduto->dataValidade,
                        'dataCompra' => $itemProduto->dataCompra, 'quantidadeItem' => $itemProduto->quantidadeItem,
                        'precoItem' => $itemProduto->precoItem, 'marca' => $itemProduto->marca];

                $produtos = \App\Produto::where('codProduto', $itemProduto->codProduto)
                                                ->get();
                foreach ($produtos as $produto) {
                    $aux['limite'] = $produto->limite;
                    $aux['nomeProduto'] = $produto->nomeProduto;
                    $aux['fornecido'] = $produto->fornecido;
                    $aux['categoria'] = $produto->categoria;
                    $aux['marca'] = $produto->marca;

                    array_push($estoque, $aux);
                }
            }
        }
        else{
            foreach ($produtos as $produto) {
                $aux = ['codProduto' => $produto->codProduto, 'limite' => $produto->limite,
                        'nomeProduto' => $produto->nomeProduto, 'fornecido' => $produto->fornecido,
                        'categoria' => $produto->categoria, 'marca' => $produto->marca];

                $itensProduto = \App\ItemProduto::where('codProduto', $produto->codProduto)
                                                ->orderBy('dataValidade')
                                                ->get();
                foreach ($itensProduto as $itemProduto) {
                    $aux['dataValidade'] = $itemProduto->dataValidade;
                    $aux['dataCompra'] = $itemProduto->dataCompra;
                    $aux['quantidadeItem'] = $itemProduto->quantidadeItem;
                    $aux['precoItem'] = $itemProduto->precoItem;
                    $aux['unidade'] = $itemProduto->unidade;

                    array_push($estoque, $aux);
                }
            }
        }

        return response()->json($estoque);
    }

    public function create()
    {
        return view('painel.estoque.create');
    }

}
