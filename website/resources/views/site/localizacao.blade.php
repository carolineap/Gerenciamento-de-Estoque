@extends('site.layout')


@section('content_out')
<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">É fácil nos achar!</h1>
          <p>Qualquer problema, ligue pra gente ou manda um whats!</p>
        </div>
      </div>
@endsection 


@section('content')
<h2 style="margin: 20px">Informações para contato:</h2>
<hr class="my-4">

<div>
    <p><b>Endereço: </b> Estrada Yamashita - Mogi das Cruzes - SP </p>
    <p><b>Telefone: 11 4792-2198</b> </p>
    <p><b>WhatsApp: 19 99657-8316</b> </p>
    <p><b>Email: </b>atendimento@jardimdosvagalumes.com.br</p>
</div>

<div class="row">
    <div class="col-sm-6 col-12">
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14628.672355906014!2d-46.1521541!3d-23.5624058!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe5cb47b0b2550bd2!2sS%C3%ADtio+Jardim+dos+Vagalumes!5e0!3m2!1spt-PT!2sbr!4v1535325326036" width="600" height="338" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="col-sm-6 col-12">
        <img class="img-fluid" src="/images/mapa.png" width="600">
    </div>
</div>
@endsection