<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Stio Jardim dos Vagalumes - Mogi das Cruzes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="/css/app.css" rel="stylesheet">
  @section('css')

  @show
</head>
<body>
  <header>
      <nav class="navbar navbar-expand-md navbar-light bg-white">
      <a class="navbar-brand" href="{{ route('home') }}">
          <img src="/images/logo.png" height="80">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href={{route('home')}}>Home</a>
                  </li>
            <li class="nav-item">
            <a class="nav-link" href={{route('sitio')}}>O Sítio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href={{route('eventos')}}>Eventos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href={{route('fotos')}}>Fotos</a>
            </li>
             <li class="nav-item">
             <a class="nav-link" href={{route('gastronomia')}}>Gastronomia</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href={{route('localizacao')}}>Localização</a>
            </li>
          </ul>
          <a class="float-right nav-item" target="__blank" href="https://pt-br.facebook.com/sitiojardimdosvagalumes/"><img src="/images/facebook.svg" height="24" alt=""></a>
        </div>
      </nav>
    </header>
    <div class="container-fluid">
        @yield('content_out')
      <div class="container">
          @yield('content')
      </div>
    </div>
      <!-- FOOTER -->
      <footer class="container">
        <p>&copy; 2018 - Stio dos Vagalumes</p>
      </footer>
    </main>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    @section('js')
    @show
</body>
</html>