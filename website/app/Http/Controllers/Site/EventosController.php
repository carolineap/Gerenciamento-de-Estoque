<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class EventosController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');
        $eventos = \App\Eventos::where('data', '>', $today)->orderBy('data')->get();

        return view('site.eventos.index')->with(compact('eventos'));
    }

    public function show($id)
    {
        $evento = \App\Eventos::find($id);
        return view('site.eventos.show')->with(compact('evento'));
    }

    public function confirm($id)
    {
        $evento = \App\Eventos::find($id);
        return view('site.eventos.confirm')->with(compact('evento'));
    }

    public function postConfirm(Request $request)
    {
        \App\Confirm::create($request->all());

        return redirect()->route('eventos')->with('message', 'Reserva efetuada. Entraremos em contato em breve.');
    }
}
