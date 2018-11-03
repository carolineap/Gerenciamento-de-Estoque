@extends('painel.layout')

@section('name', 'Gerenciamento de Reservas para o evento '.$evento->name)


@section('content')


<p>
    <a href="{{route('eventos.index')}}"><span data-feather="skip-back"></span> Voltar</a>
</p>


<div class="row">
    <div class="col-sm-12">
        <table class="table table-sm table-striped">
                <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Qtde. Pessoas</th>
                            <th></th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @forelse($evento->confirm as $confirm)
                        <tr>
                            <td>{{$confirm->name}}</td>
                            <td>{{$confirm->email}}</td>
                            <td>{{$confirm->phone}}</td>
                            <td>{{$confirm->number}}</td>
                            <td>
                                <a href="{{route('cancela.reserva', $confirm->id)}}"> Cancelar</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">Nenhuma reserva</td>
                            </tr>
                        @endforelse
                    </tbody>
        </table>
    </div>
</div>

@endsection