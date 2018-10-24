<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardapioController extends Controller
{
    public function index()
    {
        $cardapios = \App\Cardapio::all();
        return view('painel.cardapio.index')->with(compact('cardapios'));
    }

    public function create()
    {
        return view('painel.cardapio.create');
    }

    public function store(Request $request)
    {
        $time = time();
        $path = public_path()."/uploads/";
        $originalImage = $request->file('image');
        $name = $originalImage->getClientOriginalName();
        $image = \Image::make($originalImage)->encode('jpg', 100);

        $image->resize(null,800, function($constraint) {
            $constraint->aspectRatio();
        });
        $name = $time . $name;
        if ( $image->save($path.$name) ) {
            \App\Cardapio::create(['name' => $name]);
            return redirect()->route('cardapio.index');
        }

        return back();
    }

    public function delete($id)
    {
        $cardapio = \App\Cardapio::find($id);
        $path = public_path() . '/uploads/'.$cardapio->name;

        \File::delete($path);

        $cardapio->delete();

        return back();
    }
}
