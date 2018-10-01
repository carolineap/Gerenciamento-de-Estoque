@extends('painel.layout')

@section('name', 'Editando Evento - '. $evento->name)

@section('content')

<p>
        <a href="{{route('eventos.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>



<form action="{{route('eventos.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$evento->id}}">
    <div class="form-group">
        <label for="">Nome do evento</label>
        <input type="text" name="name" class="form-control" value="{{$evento->name}}">
    </div>

    <div class="form-group">
            <label for="">Descrição do evento</label>
            <textarea name="descricao" rows="5" class="form-control">{{$evento->descricao}}</textarea>
    </div>

    <div class="form-group">
            <label for="">Data do evento</label>
            <input type="date" value="{{$evento->data->format('Y-m-d')}}" name="data" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Editar esse evento</button>
</form>

@endsection