@extends('painel.layout')

@section('name', 'Adicionar Novo Receita')

@section('content')

<p>
    <a href="{{route('receitas.index')}}"> <span data-feather="skip-back"></span> Voltar </a>
</p>
<div class="row">
    <div class="col-md-4">
        <form class="newReceita" id="newReceita" method="post" action="{{route('receitas.store')}}">
            @csrf
            <h6>Nome:</h6>
            <input type="text" name="nome" placeholder="máximo 50 caracteres" maxlength="50">
            <h6>Quantidade de Pessoas:</h6>
            <input type="number" name="quntPessoas" min='1' placeholder="Mínimo 1">
            <h6>Preço:</h6>
            <input type="number" name="preco" min="0" step="0.01" placeholder="xxxx,xx">
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

            </tbody>
        </table>
    </div>

</div>
<script>

    let ingredientes = 0;

    function removeIngrediente(element){
        let row = $(element).parent().parent();
        const ingIndex = row.data('index');

        $("#newReceita > input[type='hidden']:eq("+(ingIndex*3+1)+")").remove();
        $("#newReceita > input[type='hidden']:eq("+(ingIndex*3+1)+")").remove();
        $("#newReceita > input[type='hidden']:eq("+(ingIndex*3+1)+")").remove();
        row.remove()

        let n = $("input[type='hidden']").length;

        console.log(n);

        for(let i=1; i<n; i+=3){
            $("input[type='hidden']:eq("+i+")").attr('name', 'codIngrediente'+i/3);
            $("input[type='hidden']:eq("+(i+1)+")").attr('name', 'quntIngrediente'+i/3);
            $("input[type='hidden']:eq("+(i+2)+")").attr('name', 'unidade'+i/3);
        }

        n = $("tbody > tr").length;

        for(let i=n-1; i>0; i--)
            $("tbody > tr:eq("+i+")").attr('data-index', n-1-i);

        ingredientes--;
    }

    function addIngrediente(element){
        let row = $(element).parent().parent();
        const codIngrediente = row.find("td:eq(0) > select").val();
        const nomeIngrediente = row.find("td:eq(0) > select > option:selected").text();
        const quntIngrediente = row.find("td:eq(1) > input").val();
        const unidade = row.find("td:eq(2) > select").val();

        row.attr('data-index', ingredientes);

        row.find("td:eq(0)").text(nomeIngrediente);
        row.find("td:eq(1)").text(quntIngrediente);
        row.find("td:eq(2)").text(unidade);
        row.find("td:eq(3)").html('<button type="button" class="btnAdd" onclick="editarQtd()">Alt</button>');
        row.find("td:eq(4)").html('<button class="btnAdd" onclick="removeIngrediente(this)">-</button>');

        $("#newReceita").append('<input type="hidden" name="codIngrediente'+ingredientes+'" value="'+codIngrediente+'">');
        $("#newReceita").append('<input type="hidden" name="quntIngrediente'+ingredientes+'" value="'+quntIngrediente+'">');
        $("#newReceita").append('<input type="hidden" name="unidade'+ingredientes+'" value="'+unidade+'">');

        ingredientes++;
    }


    function mudarRow(){
        var table = document.getElementById("listaIngred");
        var row = table.insertRow(2);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        let html = '<select class="selec">'
        @foreach($produtos as $produto)
            html += '<option value="{{$produto->codProduto}}">{{$produto->nomeProduto}}</option>';
        @endforeach
        html += '</select>'
        cell1.innerHTML = html;
        cell2.innerHTML = "<input type=\"number\" placeholder=\"Quantidade\"style=\"width:50%\">";
        html = '<select class="selec">'
        @foreach($unidades as $unidade)
            html += '<option value="{{$unidade->unidade}}">{{$unidade->unidade}}</option>';
        @endforeach
        html += '</select>'
        cell3.innerHTML = html;
        cell4.innerHTML = "<button type=\"button\" class=\"btnAdd\" onclick=\"addIngrediente(this)\">+</button>";
    }
    function editarQtd(){
        //var x = document.getElementById("listaIngred").rows[0].cells;
        //x[2].innerHTML = "<input type=\"number\" placeholder=\"Quantidade\"style=\"width:50%\">";
    }
</script>
@endsection
