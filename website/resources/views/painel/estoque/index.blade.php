@extends('painel.layout')

@section('name', 'Gerenciamento de Estoque')

@section('content')

<h3>Bem Vindo ao Estoque <?php echo (explode(" ", \Auth::user()->name, 2))[0]; ?></h3>
<h5>Não esqueça de decrementar no Estoque os produtos ja usados!</h5>
<h5>Confira os produtos que estão preste a vencer ou/e que estão abaixo do limite</h5>
<div>
 <a href="{{route('estoque.create')}}"><span data-feather="plus-circle" class="addNewProd"></span> Novo Produto</a>

<form class="busca" style="white-space: nowrap">
<input type="text" placeholder="buscar produto por.." maxlength="50" name="search" required>
    <select id="buscaOp" name="buscaOp" onchange="muda_busca1()">
        <option>Nome</option>
        <option>Código</option>
        <option>Categoria</option>
        <option>Data da Compra</option>
    </select>
<button type="submit" class="buscarBtn">Buscar</button>

</form>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Qtd</th>
            <th>Preço Uni.</th>
            <th>Data Compra</th>
            <th>Validade</th>
            <th>Sub</th>
            <th>Add</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estoque as $item)
            <td>{{$item->codProduto}}</td>
            <td>{{$item->nomeProduto}}</td>
            <td>{{$item->marca}}</td>
            <td>{{$item->categoria}}</td>
            <td>{{$item->quantidadeItem}}</td>
            <td>{{$item->precoItem}}</td>
            <td>{{$item->dataCompra}}</td>
            <td>{{$item->dataValidade}}</td>
            <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#subModal"><span data-feather="minus-square"></span></button></td>
            <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#addModal"><span data-feather="plus-square"></span></button></td>
            <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal"><span data-feather="edit"></span></button></td>
        @endforeach
    </tbody>


</table>
<!-- MODAL -->
<!-- Modal de decremento -->
<div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Decrementar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form>
        <div class="modal-body">
                <h6>Quantidade a ser decrementada:</h6>
              <input type="number" placeholder="Apenas número" min="0" step="0.5" required style="width: 50%;">
                <button type="button" class="btnAdd" style="background-color:#F57C00; color: white">Tudo</button>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary">Salvar</button>
            </div>
     </form>
    </div>
  </div>
</div>
<!-- Modal de adição -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form>
        <div class="modal-body">
                <h6>Quantidade a ser incrementada:</h6>
              <input class="addInput" type="number" placeholder="Apenas número" min="0" value="0" step="0.5">
                <h6>Unidade de medida: </h6>
                <select class="selec" style="width: 50%;">
                    <option>Kg</option>
                    <option>g</option>
                    <option>L</option>
                    <option>ml</option>
                    <option>unidades</option>
                    <option>Adicionar Uni.</option>
                </select>
                <h6>Data de Validade:</h6>
                <input class="addInput" type="date" placeholder="Data dd/mm/aaaa" >
                <h6>Data da Compra:</h6>
                <input class="addInput" type="date" placeholder="Data dd/mm/aaaa" >
                <h6>Preço Unitário:</h6>
                <input class="addInput" type="number" placeholder="Preço separado por vírgula" min="0" step="0.5">
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary">Salvar</button>
            </div>
     </form>
    </div>
  </div>
</div>
<!-- Modal de Informação e Edição -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informações Adicionais e Painel de Edição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form>
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
                <h6>Preço Total</h6>
                <h6>R$ 200,00</h6>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary">Salvar</button>
            </div>
     </form>
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
        }else if(opcao.localeCompare("Categoria") == 0){
            s = '';
            @foreach(\App\CategoriaProduto::all() as $categoria)
                s+='<option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>'
            @endforeach
            $("input[name='search']").replaceWith( '<select name= "search" id="buscaOp"> ' + s + ' </select> ');
        }
    }

</script>
@endsection
