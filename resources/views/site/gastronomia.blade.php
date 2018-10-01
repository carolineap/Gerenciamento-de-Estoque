@extends('site.layout')

@section('css')
    <link rel='stylesheet' href='/gallery/dist/css/unite-gallery.css' type='text/css' /> 
    <link rel='stylesheet' href='/gallery/dist/themes/default/ug-theme-default.css' type='text/css' /> 
@endsection


@section('content_out')
<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">Saboreie cada momento!</h1>
          <p>Todos os pratos são preparados na hora</p>
          <p><a class="btn btn-outline-light btn-lg" href="{{route('localizacao')}}" role="button">Traga sua família »</a></p>
        </div>
      </div>
@endsection 



@section('content')
<div id="gallery" style="margin: 40px; display:none;">

        @forelse($cardapios as $cardapio)
          <img alt="" src="/uploads/{{$cardapio->name}}"
          data-image="/uploads/{{$cardapio->name}}">
        @empty
        <h3>Nenhum cardápio disponível. Aguarde!</h3>
        @endforelse
  
</div>
@endsection

@section('js')
    <script type='text/javascript' src='/gallery/dist/js/unitegallery.min.js'></script> 
    <script type='text/javascript' src='/gallery/dist/themes/tiles/ug-theme-tiles.js'></script>

    <script type="text/javascript"> 
        jQuery(document).ready(function(){ 
          jQuery("#gallery").unitegallery({
            tiles_type:"justified"
          }); 
        }); 
      </script>
@endsection