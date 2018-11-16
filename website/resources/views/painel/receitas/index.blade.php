@extends('painel.layout')

@section('name', 'Receitas')

@section('content')
<p>
    <a href="{{route('receitas.create')}}"><span data-feather="file-plus" class="addNewProd"></span> Nova Receita</a>
</p>
<form class="busca" id="search" style="white-space: nowrap">
<input type="text" placeholder="buscar produto por.." maxlength="50" name="search" required>
    <select id="buscaOp" name="buscaOp" onchange="muda_busca1()">
        <option value="nome">Nome</option>
        <option value="codigo">Código</option>
    </select>
<button type="submit" class="buscarBtn" onclick="buscaPrato(event)">Buscar</button>

</form>

<table class="table">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade de Pessoas</th>
            <th>Quantidade de Receitas</th>
            <th>Add.List</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody id="table-body">
        @foreach($receitas as $receita)
            <tr>
                <td>{{$receita->codPrato}}</td>
                <td>{{$receita->nomePrato}}</td>
                <td>{{$receita->precoPrato}}</td>
                <td>{{$receita->quantidadePessoas}}</td>
                <td>
                    <input type="number" value="0" style="width: 40%; vertical-align: middle; text-align: right; margin-left:15px;">
                </td>
                <td><button type="button" class="btnAdd"><span data-feather="plus-square"></span></button> </td>
                <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal"><span data-feather="edit"></span></button></td>
            </tr>
        @endforeach
    </tbody>

</table>
<button type="button"  data-toggle="modal" data-target="#lista" class="btn btn-primary" style="background-color:#F57C00; color: white;border-color:#F57C00;" >Ver Lista</button>
<button  type="button" class="btn btn-primary">Calcular quantidade de ingredientes</button>

<!-- MODAL -->
<!-- Modal de calcular quantidade de ingredientes -->
<div class="modal fade" id="lista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Lista de Receitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="row modal-body">
            <table class="table">
                <thead>
                    <th>Nome</th>
                    <th>Qtd.</th>
                    <th>Remover</th>
                </thead>
                <tbody>
                    <td>Yakissoba</td>
                    <td>4</td>
                    <td> <button class="btnAdd"><span data-feather="delete"></span> Remover</button></td>
                </tbody>
            </table>

        <div class="modal-footer">

        </div>
    </div>
  </div>
</div>
<script>
    function buscaPrato(e){
        e.preventDefault();
        let search;
        search = $("#search > input:eq(0)").val();

        let buscaOp = $("#buscaOp > option:selected").val();

        $.post("{{route('receitas.search')}}", {search: search, buscaOp: buscaOp, _token: '{{csrf_token()}}'},
            function(data){
                $("#table-body").empty();
                let html;
                data.forEach(function(element){
                    html = '<tr><td>'+element.codPrato+'</td><td>'+element.nomePrato+'</td><td>'+element.precoPrato+'</td><td>'+element.quantidadePessoas+'</td><td><input type="number" value="0" style="width: 40%; vertical-align: middle; text-align: right; margin-left:15px;"></td><td><button type="button" class="btnAdd"><span data-feather="plus-square"></span></button> </td><td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal"><span data-feather="edit"></span></button></td></tr>';
                    $("#table-body").append(html);
                });
                if(data.length==0)
                    alert("Nenhum resultado encontrado.");
            }, "json").fail(function(data){
                console.log(data);
            });
    }

    function muda_busca1(){
        var opcao = document.getElementsByName("buscaOp")[0].value;

        if(opcao.localeCompare("Código") == 0){
            $("input[name='search']").replaceWith("<input type=\"number\" placeholder=\"buscar por código..\" maxlength=\"10\" name=\"search\" oninput=\"replace_not_number('1')\" pattern=\"\\d{1,10}\" title=\"Apenas números. 1 a 10 dígitos.\" required>");
            $("select[name='search']").replaceWith("<input type=\"number\" placeholder=\"buscar por código..\" maxlength=\"10\" name=\"search\" oninput=\"replace_not_number('1')\" pattern=\"\\d{1,10}\" title=\"Apenas números. 1 a 10 dígitos.\" required>");
        }else if(opcao.localeCompare("Nome") == 0){
            $("input[name='search']").replaceWith("<input type=\"text\" placeholder=\"busca por nome..\" maxlength=\"50\" name=\"search\"  title=\"Apenas letras\" required>");
            $("select[name='search']").replaceWith("<input type=\"text\" placeholder=\"busca por nome..\" maxlength=\"50\" name=\"search\"  title=\"Apenas letras\" required>");
        }
    }

</script>
@endsection
