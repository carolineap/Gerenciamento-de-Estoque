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
                                            ->where(function($q) use ($produto){
                                                $q->where('quantidadeItem', '<=', $produto->limite)
                                                  ->orWhere('dataValidade', '<=', \Carbon\Carbon::now('America/Sao_Paulo')->addWeek()->format('Y-m-d'));
                                            })
                                            ->orderBy('dataValidade')
                                            ->get();
            foreach ($itensProduto as $itemProduto) {
                $aux['dataValidade'] = \Carbon\Carbon::parse($itemProduto->dataValidade)->format('d/m/Y');
                $aux['dataCompra'] = \Carbon\Carbon::parse($itemProduto->dataCompra)->format('d/m/Y');
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
            $itensProduto = \App\ItemProduto::whereDate('dataCompra', \Carbon\Carbon::parse($request->search)->format('Y-m-d'))->orderBy('dataCompra')->orderBy('codProduto')->get();

        if($request->buscaOp=='data'){
            foreach ($itensProduto as $itemProduto) {
                $aux = ['codProduto' => $itemProduto->codProduto, 'dataValidade' => \Carbon\Carbon::parse($itemProduto->dataValidade)->format('d/m/Y'), 'dataCompra' => \Carbon\Carbon::parse($itemProduto->dataCompra)->format('d/m/Y'), 'quantidadeItem' => $itemProduto->quantidadeItem, 'precoItem' => $itemProduto->precoItem];

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
                    $aux['dataValidade'] = \Carbon\Carbon::parse($itemProduto->dataValidade)->format('d/m/Y');
                    $aux['dataCompra'] = \Carbon\Carbon::parse($itemProduto->dataCompra)->format('d/m/Y');
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
        $unidades = \App\Unidade::all();
        $categorias = \App\CategoriaProduto::all();
        return view('painel.estoque.create')->with(['unidades' => $unidades, 'categorias' => $categorias]);
    }

    public function store(Request $request){
        $produto = \App\Produto::where('nomeProduto', $request->nomeProduto)->where('marca', $request->marca)->first();
        if($produto!=null){
            if(\App\ItemProduto::whereDate('dataValidade',  \Carbon\Carbon::parse($request->dataValidade)->format('Y-m-d'))->whereDate('dataCompra',  \Carbon\Carbon::parse($request->dataCompra)->format('Y-m-d'))->where('codProduto', $request->codProduto)->exists()){
                return view('painel.estoque.create')->with('erro', 'Ocorreu um erro');
            }
            $data = ['codProduto' => $produto->codProduto, 'dataValidade' => $request->dataValidade, 'dataCompra' => $request->dataCompra, 'quantidadeItem' => $request->quantidadeItem, 'precoItem' => $request->precoItem];
            \App\ItemProduto::create($data);
            return redirect()->action('Painel\EstoqueController@index');
        }

        $produto = ['limite' => $request->limite,'nomeProduto' => $request->nomeProduto,
                    'fornecido' => ($request->fornecido==='1'?1:0), 'categoria' => $request->categoria,
                    'marca' => $request->marca];

        \App\Produto::create($produto);

        $itemProduto = ['codProduto' => \App\Produto::max('codProduto'), 'dataValidade' => $request->dataValidade,
                        'dataCompra' => $request->dataCompra, 'quantidadeItem' => $request->quantidadeItem,
                        'precoItem' => $request->precoItem];

        \App\ItemProduto::create($itemProduto);

        return redirect()->action('Painel\EstoqueController@index');
    }

    public function ajaxAlteraQuantProduto(Request $request){
        $dataValidade = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dataValidade);
        $dataCompra = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dataCompra);
        $itemProduto = \App\ItemProduto::where('codProduto', $request->codProduto)
                        ->whereDate('dataCompra', $dataCompra->format('Y-m-d'))
                        ->whereDate('dataValidade', $dataValidade->format('Y-m-d'))
                        ->first();
        if($request->quantidadeItem==0){
            $itemProduto->delete();
            return response()->json('deleted');
        }

        $itemProduto->update(['quantidadeItem' => $request->quantidadeItem]);

        return response()->json($itemProduto);
    }

    public function ajaxAtualizaProduto(Request $request){
        $dataValidade = \Carbon\Carbon::createFromFormat('d/m/Y', $request->oldVenc);
        $dataCompra = \Carbon\Carbon::createFromFormat('d/m/Y', $request->oldCompra);
        $codProduto = $request->id;

        $dadosProduto = ['nomeProduto' => $request->nomeProduto, 'marca' => $request->marca, 'limite' => $request->limite, 'fornecido' => $request->fornecido, 'categoria' => $request->categoria];

        $dadosItemProduto = ['unidade' => $request->unidade, 'quantidadeItem' => $request->quantidadeItem, 'dataValidade' => $request->dataValidade, 'dataCompra' => $request->dataCompra, 'precoItem' => $request->precoItem];

        $produto = \App\Produto::where('codProduto', $codProduto)->first();
        $produto->update($dadosProduto);

        $itemProduto = \App\ItemProduto::where('codProduto', $codProduto)
                        ->whereDate('dataCompra', $dataCompra->format('Y-m-d'))
                        ->whereDate('dataValidade', $dataValidade->format('Y-m-d'))
                        ->first();
        $itemProduto->update($dadosItemProduto);

        $dadosJson = ['nomeProduto' => $produto->nomeProduto, 'marca' => $produto->marca, 'categoria' => $produto->categoria, 'quantidadeItem' => $itemProduto->quantidadeItem, 'dataValidade' => \Carbon\Carbon::parse($itemProduto->dataValidade)->format('d/m/Y'), 'dataCompra' => \Carbon\Carbon::parse($itemProduto->dataCompra)->format('d/m/Y'), 'precoItem' => $itemProduto->precoItem];

        return response()->json($dadosJson);
    }

}
