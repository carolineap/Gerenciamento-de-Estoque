<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstoqueController extends Controller
{
    public function index()
    {
        //$estoque = \App\Eventos::orderBy('data')->withCount('confirm')->get();
        return view('painel.estoque.index')->with(compact('estoque'));
    }

    public function create()
    {
        return view('painel.estoque.create');
    }

}
