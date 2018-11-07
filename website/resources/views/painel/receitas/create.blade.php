@extends('painel.layout')

@section('name', 'Adicionar Novo Receita')

@section('content')

<p>
    <a href="{{route('receitas.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>
<div class="row">
    <div class="col-md-4">
        <form class="newReceita">
            <h6>Nome:</h6>
            <input type="text" placeholder="máximo 50 caracteres" maxlength="50">
            <h6>Quantidade de Pessoas:</h6>
            <input type="number" min='1' placeholder="Mínimo 1">
            <h6>Preço:</h6>
            <input type="number" min="0" step="0.01" placeholder="xxxx,xx">
             <button type="submit" class="btn btn-primary" style="margin-top:15px;">Adicionar nova receita</button>
        </form>
    </div>
    <div class="col-md-8" style="padding-right:50px;">
        <h5>Lista de Ingredientes:</h5   >
        <table class="table" id="listaIngred">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Quantidade:</th>
                    <th>Unid.Med:</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                 <tr id="rowAdd">
                    <td><button type="button" class="btnAdd" onclick="mudarRow()"><span data-feather="plus-square"></span> Adicionar Ingrediente</button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Macarrão</td>
                    <td>5</td>
                    <td>Kg</td>
                    <td><button type="button" class="btnAdd" onclick="editarQtd()"><span data-feather="edit"></span></button></td>
                    <td> <button class="btnAdd"><span data-feather="delete"></span></button></td> 
                </tr>
               
            </tbody>
        </table>
    </div>

</div>
<script>
    function mudarRow(){
        var table = document.getElementById("listaIngred");
        var row = table.insertRow(2);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = "<input type=\"text\" placeholder=\"Nome Produto\">";
        cell2.innerHTML = "<input type=\"number\" placeholder=\"Quantidade\"style=\"width:50%\">";
        cell3.innerHTML = '<select class=\"selec\"><option>Kg</option><option>g</option><option>L</option><option>ml</option><option>unidades</option></select>';
        cell4.innerHTML = "<button type=\"button\" class=\"btnAdd\"><span data-feather=\"plus-square\"></span></button>";
        cell5.innerHTML = "<button type=\"button\" class=\"btnAdd\"><span data-feather=\"plus-square\"></span></button>";
    }
    function editarQtd(){
        var table = document.getElementById("listaIngred");
        var cell4 = row.insertCell(2);
        cell4.innerHTML = "<input type=\"number\" placeholder=\"Quantidade\"style=\"width:50%\">"
    }
</script>
@endsection