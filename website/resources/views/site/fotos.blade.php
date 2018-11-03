@extends('site.layout')

@section('css')
    <link rel='stylesheet' href='/gallery/dist/css/unite-gallery.css' type='text/css' /> 
    <link rel='stylesheet' href='/gallery/dist/themes/default/ug-theme-default.css' type='text/css' /> 
@endsection

@section('content_out')
<div class="jumbotron text-white banner" style="border:none; background-color: #20bf6b; border-radius:0px">
        <div class="container">
          <h1 class="display-3">Registramos os melhores momentos!</h1>
          <p>Separamos as melhores fotos para você dar uma olhada e nos conhecer melhor</p>
        </div>
      </div>
@endsection 



@section('content')
<div id="gallery" style="margin: 40px; display:none;">

        @forelse($fotos as $foto)
          <img alt="" src="/uploads/{{$foto->name}}"
          data-image="/uploads/{{$foto->name}}">
        @empty
        <h3>Nenhuma foto disponível. Aguarde!</h3>
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