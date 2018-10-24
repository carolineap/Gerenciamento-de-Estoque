<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = \App\Eventos::orderBy('data')->withCount('confirm')->get();
        return view('painel.eventos.index')->with(compact('eventos'));
    }

    public function create()
    {
        return view('painel.eventos.create');
    }

    public function store(Request $request)
    {
        $path = public_path()."/uploads/";
        $originalImage = $request->file('image');
        $name = $originalImage->getClientOriginalName();
        $image = \Image::make($originalImage)->encode('jpg', 100);

        $image->resize(400,null, function($constraint) {
            $constraint->aspectRatio();
        });
        
        if ( $image->save($path.$name) ) {
            $request['capa'] = $name;
            \App\Eventos::create($request->all());
            return redirect()->route('eventos.index');
        }
    }

    public function delete($id)
    {
        $evento = \App\Eventos::find($id);
        $path = public_path() . '/uploads/'.$evento->capa;

        \App\Confirm::where('eventos');

        $evento->delete();

        \File::delete($path);

        return back();
    }

    public function edit($id)
    {
        $evento = \App\Eventos::find($id);

        return view('painel.eventos.edit')->with(compact('evento'));
    }

    public function update(Request $request)
    {
        $evento = \App\Eventos::find($request->id);

        $evento->name = $request->name;
        $evento->descricao = $request->descricao;
        $evento->data = $request->data;

        $evento->save();

        return back();
    }

    public function reserva($id)
    {
        $evento = \App\Eventos::find($id);

        return view('painel.eventos.reserva')->with(compact('evento'));
    }

    public function deleteReserva($id)
    {
        $confirm = \App\Confirm::find($id);

        $confirm->delete();

        return back();
    }

}
