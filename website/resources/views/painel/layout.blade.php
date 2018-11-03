<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Painel Administrativo - Jarim dos Vagalumes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>

        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('dash')}}">Jardim dos Vagalumes</a>
                <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                <ul class="navbar-nav px-3">
                  <li class="nav-item text-nowrap">
                  <a class="nav-link" href="{{route('logout')}}"><span data-feather="user-x"></span> Sair</a>
                  </li>
                </ul>
              </nav>
          
              <div class="container-fluid">
                <div class="row">
                  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('users')}}">
                            <span data-feather="users"></span>
                            Usuários
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('fotos.index')}}">
                            <span data-feather="camera"></span>
                            Fotos
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('cardapio.index')}}">
                            <span data-feather="file-text"></span>
                            Cardápio
                          </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('eventos.index')}}">
                            <span data-feather="file-plus"></span>
                            Eventos
                          </a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">@yield('name')</h1>
                            <p><span data-feather="user"></span> {{Auth::user()->name}}</p>
                        </div>
                      @yield('content')
                  </main>
                </div>
              </div>
    </body>
</html>
          

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
            feather.replace()
          </script>
</body>
</html>