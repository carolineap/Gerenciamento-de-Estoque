<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FotosController extends Controller
{
    public function index()
    {
        $fotos = \App\Fotos::all();
        
        return view('site.fotos')->with(compact('fotos'));
    }
}
