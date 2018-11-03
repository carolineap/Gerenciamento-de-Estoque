@extends('painel.layout')

@section('name', 'Cardapios');

@section('content')

<p>
        <a href="{{route('cardapio.create')}}"><span data-feather="image"></span> Novo Cardápio</a>
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
            @foreach($cardapios as $cardapio)
            <tr>
                <td><img src="/uploads/{{$cardapio->name}}" alt="" height="70"></td>
                <td>{{$cardapio->name}}</td>
                <td> <a href={{route('cardapio.delete', $cardapio->id)}}> <span data-feather="delete"></span> Remover </a> </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>

@endsection