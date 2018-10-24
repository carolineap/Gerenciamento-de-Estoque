@extends('painel.layout')

@section('name', 'Novo Usuário')

@section('content')

<p>
    <a href="{{route('users')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('user.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
            <label>Endereço de Email</label>
            <input type="email" name="email" class="form-control">
        </div>
    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="password" class="form-control" >
    </div>
    <div class="form-group">
            <label>Confirme a senha</label>
            <input type="password" name="password_confirmation" class="form-control" >
        </div>
    <button type="submit" class="btn btn-primary">Adicionar novo usuário</button>
</form>

@endsection