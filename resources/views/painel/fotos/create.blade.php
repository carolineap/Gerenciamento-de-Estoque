@extends('painel.layout')


@section('name', 'Adicionar nova foto')

@section('content')

<p>
        <a href="{{route('fotos.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>


<form action="{{route('fotos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Adicionar nova foto</button>
</form>

@endsection