
@extends('site.layout')


@section('content_out')
<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">Conheça o Jardim dos Vagalumes!</h1>
          <p>Conheça como a gente funciona e o que podemos oferecer para sua família.</p>
          <p><a class="btn btn-outline-light btn-lg" href="{{route('localizacao')}}" role="button">Se ficou com dúvidas, fale com a gente »</a></p>
        </div>
      </div>
@endsection 




@section('content')

<div class="row">
  <div class="col-sm-12">
      <div class="card">
          <div class="card-header">
              Nossa Estrutura
            </div>
          <div class="card-body">
              <img style="margin: 30px;" class="float-left" src="/images/house.svg" height="120" alt="">
            <p class="card-text text-sitio">Uma agradável e moderna infraestrutura te esperam no Sitio Jardim dos Vagalumes, em Mogi das Cruzes. Cercada pelo verde, em uma área de 5 mil metros quadrados, no Bairro Cocuera, o sitio oferece a oportunidade de desfrutar momentos de descontração e bem-estar no campo, com excelentes <a href="{{route('gastronomia')}}">opções de gastronomia</a> e passeios pela propriedade. Dentre as opções estão tres lagos para pesca, playgroud, horta, pomar, viveiro de arvores nativas e mudas de ervas, amplo estacionamento e restaurante. <a href="{{route('fotos')}}">dê uma olhada em nossas fotos</a></p>
          </div>
    </div>
  </div>
</div>


<div class="row" style="margin-top:20px">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Funcionamento
              </div>
            <div class="card-body">
                <img style="margin: 30px;" class="float-right" src="/images/store.svg" height="110" alt="">
              <p class="card-text text-sitio"><b>Estamos funcionando apenas com visita agendada.</b> <a href="{{route('localizacao')}}">Agende uma agora</a>. Para o café da manhã, almoço e jantar <a href="{{route('gastronomia')}}">temos cardápios</a> que devem ser contratados antecipadamente, informando o número de pessoas e o horário de permanência. Bebidas serão vendidas separadamente em nosso bar. Para eventos, fazer reserva com 15 dias de atecendência. Mínimo 15 pessoas e máximo 60 pessoas. </p>
            </div>
      </div>
    </div>
  </div>

@endsection
