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
                <td><button type="button" class="btnAdd" onclick="addToList(this)"><span data-feather="plus-square"></span></button> </td>
                <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal"><span data-feather="edit"></span></button></td>
            </tr>
        @endforeach
    </tbody>

</table>
<button type="button"  data-toggle="modal" data-target="#lista" class="btn btn-primary" onclick="atualizaTabela()" style="background-color:#F57C00; color: white;border-color:#F57C00;" >Ver Lista</button>
<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#calculo" onclick="atualizaTabelaIngredientes()">Calcular quantidade de ingredientes</button>

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
                        </tbody>
                    </table>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="calculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Ingredientes</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
                <div class="row modal-body">
                    <table class="table">
                        <thead>
                            <th>Nome</th>
                            <th>Qtd. Necessária</th>
                            <th>Qtd. Estoque</th>
                            <th>Qtd. Faltando</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let listaReceitas = [];
    let index;

    function atualizaTabelaIngredientes(){
        let jsonReceitas = JSON.stringify(listaReceitas);

        $.post("{{route('receitas.info')}}", {listaReceitas: jsonReceitas, _token: '{{csrf_token()}}'},
            function(data){
                $("#calculo > div > div > div > table > tbody").empty();
                Object.keys(data).forEach(function(key, index){
                    html = '<tr><td>'+key+'</td>'
                    Object.keys(this[key]).forEach(function(k, i){
                        html+='<td>'+this[k].quantidadeProduto+' '+k+'</td><td>'+this[k].quantidadeItem+' '+k+'</td><td>'+this[k].quantidadeFaltando+' '+k+'</td></tr>'
                    }, this[key]);
                    $("#calculo > div > div > div > table > tbody").append(html);
                }, data);
            }, "json").fail(function(data){
                console.log(data);
        });
    }

    function removeFromList(index){
        listaReceitas.splice(index, 1);
        atualizaTabela();
    }

    function atualizaTabela(){
        $("#lista > div > div > div > table > tbody").empty();
        listaReceitas.forEach(function(v, i){
            html = '<tr><td>'+v.nome+'</td><td>'+v.quntReceitas+'</td><td> <button class="btnAdd" onclick="removeFromList('+i+')">Remover</button></td></tr>';
            $("#lista > div > div > div > table > tbody").append(html);
        });
    }

    function addToList(element){
        index = $("tr").index($(element).parent().parent());

        const aux = $("tr:eq("+index+")");
        const codigo = aux.find("td:eq(0)").text();
        const nome = aux.find("td:eq(1)").text();
        const preco = aux.find("td:eq(2)").text();
        const quntPessoas = aux.find("td:eq(3)").text();
        const quntReceitas = aux.find("td:eq(4) > input").val();

        for(let i=0; i<listaReceitas.length; i++){
            if(listaReceitas[i].codigo===codigo){
                alert("A receita já esta na lista");
                return;
            }
        }

        listaReceitas.push({codigo: codigo, nome: nome, preco: preco, quntReceitas: quntReceitas, quntPessoas: quntPessoas});
    }

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
                    html = '<tr><td>'+element.codPrato+'</td><td>'+element.nomePrato+'</td><td>'+element.precoPrato+'</td><td>'+element.quantidadePessoas+'</td><td><input type="number" value="0" style="width: 40%; vertical-align: middle; text-align: right; margin-left:15px;"></td><td><button type="button" class="btnAdd" onclick="addToList(this)">+</button> </td><td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal"><span data-feather="edit"></span></button></td></tr>';
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
