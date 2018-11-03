@extends('site.layout')


@section('content_out')
<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">Esperamo sua família para {{$evento->name}} </h1>
          <p>Confirme presença e curta uma ótima comida e um lugar maravilhoso!</p>
          <p><a class="btn btn-outline-light btn-lg" href="{{route('eventos.confirm', $evento->id)}}" role="button">Confirmar presença »</a></p>
        </div>
      </div>
@endsection 


@section('content')

<div class="row">
    <div class="col-sm-12">
        <h2>Mais informações</h2>
        <hr class="my-4">
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <h4>Data do Evento: {{$evento->data->format('d/m/Y')}}</h4>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <p>
            <img class="rounded float-right" src="/uploads/{{$evento->capa}}" alt="">
            {{$evento->descricao}}
        </p>
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
            <p style="padding: 20px">
                    <a href="{{route('eventos')}}">Voltar</a>
                </p>
    </div>
</div>

@endsection