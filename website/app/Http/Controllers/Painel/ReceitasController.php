<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class receitasController extends Controller
{
    public function index()
    {
        //$receitas = \App\Eventos::orderBy('data')->withCount('confirm')->get();
        return view('painel.receitas.index')->with(compact('receitas'));
    }

    public function create()
    {
        return view('painel.receitas.create');
    }

}