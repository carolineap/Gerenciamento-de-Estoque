<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GastronomiaController extends Controller
{
    public function index()
    {
        $cardapios = \App\Cardapio::all();
        return view('site.gastronomia')->with(compact('cardapios'));
    }
}
