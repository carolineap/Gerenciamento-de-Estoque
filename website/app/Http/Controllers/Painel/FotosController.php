<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FotosController extends Controller
{
    public function index()
    {
        $fotos = \App\Fotos::all();
        return view('painel.fotos.index')->with(compact('fotos'));
    }

    public function create()
    {
        return view('painel.fotos.create');
    }

    public function store(Request $request)
    {
        $time = time();
        $path = public_path()."/uploads/";
        $originalImage = $request->file('image');
        $name = $originalImage->getClientOriginalName();
        $image = \Image::make($originalImage)->encode('jpg', 100);
        $image->orientate();
        $image->heighten(1000, function($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        });
        $name = $time . $name;
        if ( $image->save($path.$name) ) {
            \App\Fotos::create(['name' => $name]);
            return redirect()->route('fotos.index');
        }

        return back();
    }

    public function delete($id)
    {
        $foto = \App\Fotos::find($id);
        $path = public_path() . '/uploads/'.$foto->name;

        \File::delete($path);

        $foto->delete();

        return back();
    }
}
