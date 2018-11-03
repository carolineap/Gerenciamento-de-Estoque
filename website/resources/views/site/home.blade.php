@extends('site.layout')


@section('css')


@endsection

@section('content_out')

<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">Queremos muito recebê-lo!</h1>
          <p>Conheça nossos diversos eventos gastronômicos ou faça seu evento com a gente!</p>
          <p><a class="btn btn-outline-light btn-lg" href="{{route('eventos')}}" role="button">Conhecer nossos eventos »</a></p>
        </div>
      </div>

@endsection 
  
@section('content')
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
  
        <div class="container marketing">
  
          <!-- Three columns of text below the carousel -->
          <div class="row">
            <div class="col-lg-4">
              <img class="rounded-circle" src="/images/house.svg" alt="Nossa estrutura" width="140" height="140">
              <h2>Estrutura</h2>
              <p>Conheça como a gente funciona e o que podemos oferecer para sua família.</p>
              <p><a class="btn btn-outline-success" href="{{route('sitio')}}" role="button">Dê uma olhada &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" src="/images/photo.svg" alt="Galeria de fotos" width="140" height="140">
              <h2>Galeria de fotos</h2>
              <p>Registramos momentos maravilhosos e colocamos aqui para você</p>
              <p><a class="btn btn-outline-success" href="{{route('fotos')}}" role="button">Dê uma olhada &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <img class="rounded-circle" src="/images/contato.svg" alt="Generic placeholder image" width="140" height="140">
              <h2>Fale com a gente</h2>
              <p>Tire sua dúvida, ficaremos felizes em atendê-lo</p>
              <p><a class="btn btn-outline-success" href="{{route('localizacao')}}" role="button">Fale agora&raquo;</a></p>
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
  
        </div><!-- /.container -->
  
@endsection
