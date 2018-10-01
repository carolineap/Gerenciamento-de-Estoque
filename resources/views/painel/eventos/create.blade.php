@extends('painel.layout')

@section('name', 'Novo Evento')

@section('content')

<p>
        <a href="{{route('eventos.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>



<form action="{{route('eventos.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="">Nome do evento</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
            <label for="">Descrição do evento</label>
            <textarea name="descricao" rows="5" class="form-control"></textarea>
    </div>

    <div class="form-group">
            <label for="">Data do evento</label>
            <input type="date" name="data" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Foto capa do evento</label>
        <p></p>
        <input type="file" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Adicionar esse evento</button>
</form>

@endsection