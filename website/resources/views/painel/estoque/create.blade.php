@extends('painel.layout')

@section('name', 'Adicionar Novo Produto')

@section('content')

<p>
    <a href="{{route('estoque.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>

<form class="newEstoque" method="post" action="{{route('estoque.store')}}">

    @csrf

    <div class="row modal-body">
        <div class="col-md-6">
            <h6>Nome:</h6>
            <input type="text" placeholder="máximo 50 caracteres" maxlength="50" name="nomeProduto">
            <h6>Marca:</h6>
            <input type="text" placeholder="máximo 50 caracteres" maxlength="50" name="marca">
            <h6>Limite mínimo:</h6>
            <input type="number" placeholder="Apenas número" min="0" value="0" name="limite">
            <h6>Unidade de Medida:</h6>
             <select class="selec" name="unidade">
                @foreach($unidades as $unidade)
                    <option value="{{$unidade->unidade}}">{{$unidade->unidade}}</option>
                @endforeach
            </select>
            <h6>Produzido ou Comprado</h6>
            <select class="selec" name="fornecido">
            <option value="0">Comprado</option>
            <option value="1">Produzido</option>
            </select>
        </div>
        <div class="col-md-6">
             <h6>Categoria</h6>
            <select class="selec" name="categoria">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>
            <h6>Quantidade:</h6>
            <input type="number" placeholder="Apenas número" min="0" value="0" step="0.5" name="quantidadeItem">
           <h6>Data de Validade:</h6>
            <input type="date" placeholder="Data dd/mm/aaaa" name="dataValidade">
            <h6>Data da Compra:</h6>
            <input type="date" placeholder="Data dd/mm/aaaa" name="dataCompra">
            <h6>Preço Unitário:</h6>
            <input type="number" placeholder="Preço separado por vírgula" min="0" step="0.01" name="precoItem">
             <button type="submit" class="btn btn-primary" style="margin-top:15px;">Adicionar novo produto</button>
        </div>
    </div>
</form>


@endsection
