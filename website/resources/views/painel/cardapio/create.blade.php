@extends('painel.layout')


@section('name', 'Adicionar nov cardapio')

@section('content')

<p>
        <a href="{{route('cardapio.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>


<form action="{{route('cardapio.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Adicionar novo cardápio</button>
</form>

@endsection