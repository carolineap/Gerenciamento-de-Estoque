@extends('painel.layout')

@section('name', 'Adicionar Novo Produto')

@section('content')

<p>
    <a href="{{route('estoque.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>

<form class="newEstoque">

    <div class="row modal-body">
        <div class="col-md-6">
            <h6>Nome:</h6>
            <input type="text" placeholder="máximo 50 caracteres" maxlength="50">
            <h6>Marca:</h6>
            <input type="text" placeholder="máximo 50 caracteres" maxlength="50">
            <h6>Limite mínimo:</h6>
            <input type="number" placeholder="Apenas número" min="0" value="0" >
            <h6>Unidade de Medida:</h6>
             <select class="selec">
                <option>Kg</option>
                <option>g</option>
                <option>L</option>
                <option>ml</option>
                <option>unidades</option>
            </select>
            <h6>Produzido ou Comprado</h6>
            <select class="selec">
            <option>Comprado</option>
            <option>Produzido</option>
            </select>
        </div>
        <div class="col-md-6">
            <h6>Quantidade:</h6>
            <input type="number" placeholder="Apenas número" min="0" value="0" step="0.5">
           <h6>Data de Validade:</h6>
            <input type="date" placeholder="Data dd/mm/aaaa" >
            <h6>Data da Compra:</h6>
            <input type="date" placeholder="Data dd/mm/aaaa" >
            <h6>Preço Unitário:</h6>
            <input type="number" placeholder="Preço separado por vírgula" min="0" step="0.01">
             <button type="submit" class="btn btn-primary" style="margin-top:15px;">Adicionar novo produto</button>
        </div>
    </div>
</form>


@endsection