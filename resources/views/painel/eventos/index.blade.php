@extends('painel.layout')

@section('name', 'Gerenciamento de Eventos')

@section('content')


<p>
        <a href="{{route('eventos.create')}}"><span data-feather="folder-plus"></span> Novo Evento</a>
</p>

<table class="table">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Data</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
    
        <tbody>
            @foreach($eventos as $evento)
            <tr>
                <td><img src="/uploads/{{$evento->capa}}" alt="" width="100"></td>
                <td>{{$evento->name}}</td>
                <td>{{$evento->data->format('d/m/Y')}}</td>
                <td> <a href={{route('eventos.reserva', $evento->id)}}> <span data-feather="check-square"></span> Reservas ({{$evento->confirm_count}}) </a> </td>
                <td> <a href={{route('eventos.edit', $evento->id)}}> <span data-feather="edit"></span> Editar </a> </td>
                <td> <a href={{route('eventos.delete', $evento->id)}}> <span data-feather="delete"></span> Remover </a> </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>


@endsection