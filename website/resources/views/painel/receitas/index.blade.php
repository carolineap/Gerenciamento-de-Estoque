@extends('painel.layout')

@section('name', 'Receitas')

@section('content')
<p>
    <a href="{{route('estoque.create')}}"><span data-feather="file-plus" class="addNewProd"></span> Nova Receita</a>
</p>
<form class="busca" style="white-space: nowrap">
<input type="text" placeholder="buscar produto por.." maxlength="50" name="search" required>
    <select id="buscaOp" name="buscaOp" onchange="muda_busca1()">
        <option>Nome</option>
        <option>Código</option>
    </select>
<button type="submit" class="buscarBtn">Buscar</button>      

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
    <tbody>
        <td>33</td>
        <td>Yakisoba</td>
        <td>40,00</td>
        <td>10</td>
        <td>
            <input type="number" value="0">
        </td>
        <td> </td>
        <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal"><span data-feather="edit"></span></button></td>
    </tbody>
    
</table>
<button  type="button" data-toggle="modal" data-target="#calcular" class="btn btn-primary" >Calcular quantidade de ingredientes</button>

<!-- MODAL -->
<!-- Modal de calcular quantidade de ingredientes -->
<div class="modal fade" id="calcular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Calcular quantidade de ingredientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="row modal-body">
            <div class="col-md-4 colunaCalc">
            <h5>Quantidade necessária</h5>
                <table class="table calc">
                    <thead>
                        <th>Quantidade</th>
                        <th>Uni.</th>
                        <th>Ingrediente</th>
                    </thead>
                    <tbody>
                        <td>20</td>
                        <td>Kg</td>
                        <td>Macarrão</td>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 colunaCalc">
            <h5>Quantidade no Estoque</h5>
                  <table class="table calc">
                    <thead>
                        <th>Quantidade</th>
                        <th>Uni.</th>
                        <th>Ingrediente</th>
                    </thead>
                    <tbody>
                        <td>10</td>
                        <td>Kg</td>
                        <td>Macarrão</td>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 colunaCalc">
            <h5>Quantidade a Comprar</h5>
                  <table class="table calc">
                    <thead>
                        <th>Quantidade</th>
                        <th>Uni.</th>
                        <th>Ingrediente</th>
                    </thead>
                    <tbody>
                        <td>10</td>
                        <td>Kg</td>
                        <td>Macarrão</td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
  </div>
</div>
<script>
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