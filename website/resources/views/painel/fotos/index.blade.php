@extends('painel.layout')

@section('name', 'Fotos');

@section('content')

<p>
        <a href="{{route('fotos.create')}}"><span data-feather="image"></span> Nova Foto</a>
</p>

<table class="table">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
    
        <tbody>
            @foreach($fotos as $foto)
            <tr>
                <td><img src="/uploads/{{$foto->name}}" alt="" height="70"></td>
                <td>{{$foto->name}}</td>
                <td> <a href={{route('fotos.delete', $foto->id)}}> <span data-feather="delete"></span> Remover </a> </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>

@endsection