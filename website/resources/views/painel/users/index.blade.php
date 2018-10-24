@extends('painel.layout')

@section('name', 'Gerenciamento de Usuários')

@section('content')

<p>
    <a href="{{route('user.create')}}"><span data-feather="user-plus"></span> Novo Usuário</a>
</p>

<table class="table">

    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td> <a href="#"> <span data-feather="edit"></span> Editar </a> </td>
            <td> <a href={{route('delete', $user->id)}}> <span data-feather="delete"></span> Remover </a> </td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection