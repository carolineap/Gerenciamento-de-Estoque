@extends('site.layout')


@section('content_out')
<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">Participe com a gente!</h1>
          <p>Escolha abaixo o evento que acontecerá no Jardim dos Vagalumes e faça sua reserva ou faça seu evento!</p>
          <p><a class="btn btn-outline-light btn-lg" href="{{route('localizacao')}}" role="button">Veja como é fácil fazer seu evento »</a></p>
        </div>
      </div>
@endsection 
  



@section('content')
<div class="box" style="padding:20px">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    <div class="row">
           
        @forelse($eventos as $evento)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/uploads/{{$evento->capa}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$evento->name}}</h5>
                    <p class="card-text">{{str_limit($evento->descricao, 100)}}</p>
                </div>
                <div class="card-body">
                    <a href="{{route('eventos.show', $evento->id)}}" class="card-link">Mais informnações</a>
                    <a href="{{route('eventos.confirm', $evento->id)}}" class="card-link">Inscreva-se</a>
                </div>
                <div class="card-footer text-muted">
                    Data do evento: {{$evento->data->format('d/m/Y')}}
                </div>
            </div>
        </div>
        @empty
        <h3>Nenhum evento disponível. Aguarde!</h3>
        @endforelse
    </div>
</div>



@endsection