@extends('painel.layout')

@section('name', 'Gerenciamento de Estoque')

@section('content')

<h3>Bem-vindo(a) ao estoque, <?php echo (explode(" ", \Auth::user()->name, 2))[0]; ?></h3>
<h5>Não esqueça de decrementar no estoque os produtos já usados!</h5>
<h5>Confira os produtos que estão prestes a vencer e/ou que estão abaixo do limite</h5>
<div>
 <a href="{{route('estoque.create')}}"><span data-feather="plus-circle" class="addNewProd"></span> Novo Produto</a>

<form class="busca" id="search" style="white-space: nowrap">
<input type="text" placeholder="buscar produto por.." maxlength="50" name="search" required>
    <select id="buscaOp" name="buscaOp" onchange="muda_busca1()">
        <option value="nome">Nome</option>
        <option value="codigo">Código</option>
        <option value="categoria">Categoria</option>
        <option value="data">Data da Compra</option>
    </select>
<button type="submit" class="buscarBtn" onclick="buscaProduto(event)">Buscar</button>

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
    <tbody id="table-body">
        @foreach($estoque as $item)
            <tr>
                <td>{{$item["codProduto"]}}</td>
                <td>{{$item["nomeProduto"]}}</td>
                <td>{{(isset($item["marca"])?$item["marca"]:'null')}}</td>
                <td>{{$item["categoria"]}}</td>
                <td>{{$item["quantidadeItem"]}}</td>
                <td>{{(isset($item["precoItem"])?$item["precoItem"]:'null')}}</td>
                <td>{{$item["dataCompra"]}}</td>
                <td>{{$item["dataValidade"]}}</td>
                <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#subModal" data-cod="{{$item['codProduto']}}" data-compra="{{$item['dataCompra']}}" data-venc="{{$item['dataValidade']}}" data-quant="{{$item['quantidadeItem']}}" onclick="passIdToModal(this, 'sub')"><span data-feather="minus-square"></span></button></td>
                <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#addModal" data-cod="{{$item['codProduto']}}" data-compra="{{$item['dataCompra']}}" data-venc="{{$item['dataValidade']}}" data-quant="{{$item['quantidadeItem']}}" onclick="passIdToModal(this, 'add')"><span data-feather="plus-square"></span></button></td>
                <td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal" data-id="{{$item['codProduto']}}" data-limite="{{$item['limite']}}" data-unidade="{{$item['unidade']}}" data-fornecido="{{$item['fornecido']}}" onclick="passIdToModal(this, 'info')"><span data-feather="edit"></span></button></td>
            </tr>
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
        <input type="hidden" name="codProduto" value="0">
        <input type="hidden" name="dataCompra" value="0">
        <input type="hidden" name="dataValidade" value="0">
        <input type="hidden" name="quantTotalItem" value="0">
        <div class="modal-body">
                <h6>Quantidade a ser decrementada:</h6>
              <input name="quantidadeItem" type="number" placeholder="Apenas número" min="0" step="0.5" value="0" required style="width: 50%;">
                <button type="button" class="btnAdd" style="background-color:#F57C00; color: white">Tudo</button>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary" onclick="subQuantItem(event)">Salvar</button>
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
            <input type="hidden" name="codProduto" value="0">
            <input type="hidden" name="dataCompra" value="0">
            <input type="hidden" name="dataValidade" value="0">
            <input type="hidden" name="quantTotalItem" value="0">
            <div class="modal-body">
                    <h6>Quantidade a ser incrementada:</h6>
                  <input name="quantidadeItem" value="0" type="number" placeholder="Apenas número" min="0" step="0.5" value="0" required style="width: 50%;">
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary" onclick="addQuantItem(event)">Salvar</button>
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
            <input type="hidden" name="codProduto" value="0">
            <input type="hidden" name="oldDataCompra" value="0">
            <input type="hidden" name="oldDataValidade" value="0">
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
                    @foreach(\App\Unidade::all() as $unidade)
                        <option value="{{$unidade->unidade}}">{{$unidade->unidade}}</option>
                    @endforeach
                </select>
                <h6>Produzido ou Comprado</h6>
                <select class="selec" name="fornecido">
                    <option value="0">Comprado</option>
                    <option value="1">Produzido</option>
                </select>
                <h6 style="text-align: left;margin-top: 20px" id="precoTotal"></h6>
            </div>
            <div class="col-md-6">
                <h6>Categoria</h6>
                <select class="selec" name="categoria">
                    @foreach(\App\CategoriaProduto::all() as $categoria)
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

            </div>
            </div>
            <div class="modal-footer">
                <button type="submit"  class="btn btn-primary" onclick="updateDadosItem(event)">Salvar</button>
            </div>
     </form>
    </div>
  </div>
</div>
<script>
    /*function getQuant(){
        let quant = $("#subModal > div > div > form > div > button:first").data('quant');
        console.log(quant);
        $("#subModal > div > div > form > div > input[name='quantidadeItem']").val(quant);
    }*/

    let index;

    function updateDadosItem(event){
        event.preventDefault();
        const id = $("#infoModal > div > div > form > input[name='codProduto']").val();
        const oldVenc = $("#infoModal > div > div > form > input[name='oldDataValidade']").val();
        const oldCompra = $("#infoModal > div > div > form > input[name='oldDataCompra']").val();

        console.log(oldCompra);
        console.log(oldVenc);

        const nomeProduto = $("#infoModal > div > div > form > div > div:eq(0) > input[name='nomeProduto']").val();
        const marca = $("#infoModal > div > div > form > div > div:eq(0) > input[name='marca']").val();
        const limite = $("#infoModal > div > div > form > div > div:eq(0) > input[name='limite']").val();
        const unidade = $("#infoModal > div > div > form > div > div:eq(0) > select[name='unidade']").val();
        const fornecido = $("#infoModal > div > div > form > div > div:eq(0) > select[name='fornecido']").val();
        const categoria = $("#infoModal > div > div > form > div > div:eq(1) > select[name='categoria']").val();
        const quantidadeItem = $("#infoModal > div > div > form > div > div:eq(1) > input[name='quantidadeItem']").val();
        const dataValidade = $("#infoModal > div > div > form > div > div:eq(1) > input[name='dataValidade']").val();
        const dataCompra = $("#infoModal > div > div > form > div > div:eq(1) > input[name='dataCompra']").val();
        const precoItem = $("#infoModal > div > div > form > div > div:eq(1) > input[name='precoItem']").val();

        const sndMsg = {
            id: id,
            oldCompra: oldCompra,
            oldVenc: oldVenc,
            nomeProduto: nomeProduto,
            marca: marca,
            limite: limite,
            unidade: unidade,
            fornecido: fornecido,
            categoria: categoria,
            quantidadeItem: quantidadeItem,
            dataValidade: dataValidade,
            dataCompra: dataCompra,
            precoItem: precoItem,
            _token: '{{csrf_token()}}'
        };

        $.post("{{route('estoque.info')}}", sndMsg,
            function(data){
                console.log(data);
                $("tr:eq("+index+") > td:eq(1)").text(data.nomeProduto);
                $("tr:eq("+index+") > td:eq(2)").text(data.marca);
                $("tr:eq("+index+") > td:eq(3)").text(data.categoria);
                $("tr:eq("+index+") > td:eq(4)").text(data.quantidadeItem);
                $("tr:eq("+index+") > td:eq(5)").text(data.precoItem);
                $("tr:eq("+index+") > td:eq(6)").text(data.dataCompra);
                $("tr:eq("+index+") > td:eq(7)").text(data.dataValidade);
            }, "json").fail(function(data){
                console.log(data);
        });
    }

    function subQuantItem(event){
        event.preventDefault();
        const id = $("#subModal > div > div > form > input[name='codProduto']").val();
        const compra = $("#subModal > div > div > form > input[name='dataCompra']").val();
        const venc = $("#subModal > div > div > form > input[name='dataValidade']").val();
        const quantRemover = parseFloat($("#subModal > div > div > form > div > input[name='quantidadeItem']")
                                .val());
        const quantTotal = parseFloat($("#subModal > div > div > form > input[name='quantTotalItem']").val());
        const quant = quantTotal-quantRemover;

        $.post("{{route('estoque.change')}}", {codProduto: id, dataCompra: compra, dataValidade: venc,
            quantidadeItem: quant, _token: '{{csrf_token()}}'},
            function(data){
                if(data!='deleted')
                    $("tr:eq("+index+") > td:eq(4)").text(data.quantidadeItem);
                else
                    $("tr:eq("+index+")").remove();
            }, "json").fail(function(data){
                console.log(data);
        });
    }

    function addQuantItem(event){
        event.preventDefault();
        const id = $("#addModal > div > div > form > input[name='codProduto']").val();
        const compra = $("#addModal > div > div > form > input[name='dataCompra']").val();
        const venc = $("#addModal > div > div > form > input[name='dataValidade']").val();
        const quantAdicionar = parseFloat($("#addModal > div > div > form > div > input[name='quantidadeItem']")
                                .val());
        const quantTotal = parseFloat($("#addModal > div > div > form > input[name='quantTotalItem']").val());
        const quant = quantTotal+quantAdicionar;

        $.post("{{route('estoque.change')}}", {codProduto: id, dataCompra: compra, dataValidade: venc,
            quantidadeItem: quant, _token: '{{csrf_token()}}'},
            function(data){
                $("tr:eq("+index+") > td:eq(4)").text(data.quantidadeItem);
            }, "json").fail(function(data){
                console.log(data);
        });
    }

    function passIdToModal(element, type){
        index = $("tr").index($(element).parent().parent());
        let id = $(element).data('cod');
        if(type==="sub"){
            let compra = $(element).data('compra');
            let venc = $(element).data('venc');
            let quant = $(element).data('quant');
            $("#subModal > div > div > form > input[name='codProduto']").val(id);
            $("#subModal > div > div > form > input[name='dataCompra']").val(compra);
            $("#subModal > div > div > form > input[name='dataValidade']").val(venc);
            $("#subModal > div > div > form > input[name='quantTotalItem']").val(quant);
            $("#subModal > div > div > form > div > input[name='quantidadeItem']").val(quant);
            $("#subModal > div > div > form > div > input[name='quantidadeItem']").attr('max', quant);
        }
        else if(type==="add"){
            let compra = $(element).data('compra');
            let venc = $(element).data('venc');
            let quant = $(element).data('quant');
            $("#addModal > div > div > form > input[name='codProduto']").val(id);
            $("#addModal > div > div > form > input[name='dataCompra']").val(compra);
            $("#addModal > div > div > form > input[name='dataValidade']").val(venc);
            $("#addModal > div > div > form > input[name='quantTotalItem']").val(quant);
        }
        else{
            let aux = $("tr:eq("+index+")");
            const dataValidade = aux.find("td:eq(7)").text().split("/");
            const dataCompra = aux.find("td:eq(6)").text().split("/");
            let preco = aux.find("td:eq(5)").text()==="null"?"0":aux.find("td:eq(5)").text()
            let marca = aux.find("td:eq(2)").text()==="null"?"":aux.find("td:eq(2)").text()
            $("#infoModal > div > div > form > div > div:eq(0) > input[name='nomeProduto']").val(aux.find("td:eq(1)").text());
            $("#infoModal > div > div > form > div > div:eq(0) > input[name='marca']").val(marca);
            $("#infoModal > div > div > form > div > div:eq(0) > input[name='limite']").val($(element).data('limite'));
            $("#infoModal > div > div > form > div > div:eq(0) > select[name='unidade'] > option[value='"+$(element).data('unidade')+"']").attr('selected', 'selected');
            $("#infoModal > div > div > form > div > div:eq(0) > select[name='fornecido'] > option[value='"+$(element).data('fornecido')+"']").attr('selected', 'selected');
            $("#infoModal > div > div > form > div > div:eq(1) > select[name='categoria'] > option[value='"+aux.find("td:eq(3)").text()+"']").attr('selected', 'selected');
            $("#infoModal > div > div > form > div > div:eq(1) > input[name='quantidadeItem']").val(aux.find("td:eq(4)").text());
            $("#infoModal > div > div > form > div > div:eq(1) > input[name='dataValidade']").val(dataValidade[2]+"-"+dataValidade[1]+"-"+dataValidade[0]);
            $("#infoModal > div > div > form > div > div:eq(1) > input[name='dataCompra']").val(dataCompra[2]+"-"+dataCompra[1]+"-"+dataCompra[0]);
            $("#infoModal > div > div > form > div > div:eq(1) > input[name='precoItem']").val(preco);
            $("#infoModal > div > div > form > input[name='codProduto']").val(aux.find("td:eq(0)").text());
            $("#infoModal > div > div > form > input[name='oldDataValidade']").val(aux.find("td:eq(7)").text());
            $("#infoModal > div > div > form > input[name='oldDataCompra']").val(aux.find("td:eq(6)").text());
            if(preco!=="0"){
                $("#precoTotal").text("Preço total: R$ "+(parseFloat(preco)*parseFloat(aux.find("td:eq(4)").text())).toFixed(2));
            }
            else{
                $("#precoTotal").text("Não é possível calcular.");
            }
        }
    }

    function buscaProduto(e){
        e.preventDefault();
        let search;
        if($("#search :first-child").is("select"))
            search = $("#search > select:eq(0) > option:selected").val();

        else
            search = $("#search > input:eq(0)").val();

        let buscaOp = $("#buscaOp > option:selected").val();

        $.post("{{route('estoque.search')}}", {search: search, buscaOp: buscaOp, _token: '{{csrf_token()}}'},
            function(data){
                $("#table-body").empty();
                let html;
                data.forEach(function(element){
                    html = '<tr><td>'+element.codProduto+'</td><td>'+element.nomeProduto+'</td><td>'+element.marca+'</td><td>'+element.categoria+'</td><td>'+element.quantidadeItem+'</td><td>'+element.precoItem+'</td><td>'+element.dataCompra+'</td><td>'+element.dataValidade+'</td><td><button style="display:block;" type="button" class="btnAdd" data-toggle="modal" data-target="#subModal" data-cod="'+element.codProduto+'" data-compra="'+element.dataCompra+'" data-venc="'+element.dataValidade+'" data-quant="'+element.quantidadeItem+'" onclick="passIdToModal(this, \'sub\')">-</button></td><td><button type="button" class="btnAdd" data-toggle="modal" data-target="#addModal" data-cod="'+element.codProduto+'" data-compra="'+element.dataCompra+'" data-venc="'+element.dataValidade+'" data-quant="'+element.quantidadeItem+'" onclick="passIdToModal(this, \'add\')">+</span></button></td><td><button type="button" class="btnAdd" data-toggle="modal" data-target="#infoModal" data-id="'+element.codProduto+'" data-limite="'+element.limite+'" data-unidade="'+element.unidade+'" data-fornecido="'+element.fornecido+'" onclick="passIdToModal(this, \'info\')">Alt</span></button></td></tr>';
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

        if(opcao.localeCompare("codigo") == 0){
            $("input[name='search']").replaceWith("<input type=\"number\" placeholder=\"buscar por código..\" maxlength=\"10\" name=\"search\" oninput=\"replace_not_number('1')\" pattern=\"\\d{1,10}\" title=\"Apenas números. 1 a 10 dígitos.\" required>");
            $("select[name='search']").replaceWith("<input type=\"number\" placeholder=\"buscar por código..\" maxlength=\"10\" name=\"search\" oninput=\"replace_not_number('1')\" pattern=\"\\d{1,10}\" title=\"Apenas números. 1 a 10 dígitos.\" required>");
        }else if(opcao.localeCompare("nome") == 0){
            $("input[name='search']").replaceWith("<input type=\"text\" placeholder=\"busca por nome..\" maxlength=\"50\" name=\"search\"  title=\"Apenas letras\" required>");
            $("select[name='search']").replaceWith("<input type=\"text\" placeholder=\"busca por nome..\" maxlength=\"50\" name=\"search\" title=\"Apenas letras\" required>");
        }else if(opcao.localeCompare("categoria") == 0){
            s = '';
            @foreach(\App\CategoriaProduto::all() as $categoria)
                s+='<option value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>'
            @endforeach
            $("input[name='search']").replaceWith( '<select name= "search" class="selec" style="width: 17%;"> ' + s + ' </select> ');
            $("select[name='search']").replaceWith( '<select name= "search" class="selec" style="width: 17%;"> ' + s + ' </select> ');
        }else if(opcao.localeCompare("data") == 0){
            $("input[name='search']").replaceWith("<input type=\"date\"  name=\"search\" required>");
            $("select[name='search']").replaceWith("<input type=\"date\" name=\"search\" required>");
        }
    }

</script>
@endsection
