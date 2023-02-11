<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="icon" href="/img/pokeball.png"/>
  <title>@yield('title', 'Tienda de peluches')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}"><img src="{{ asset('/img/logo.png') }}" width="150px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <?php
            $rolAdmin = Auth::user()->role; 
            if($rolAdmin == 'admin'){
              echo '<a class="nav-link active bg-secondary" href="'.route('admin.home.index').'">Admin</a>';
            }
          ?>
          <a class="nav-link active bg-secondary" href="{{ route('home.index') }}">Inicio</a>
          <a class="nav-link active bg-secondary" href="{{ route('product.index') }}">Productos</a>
          <a class="nav-link active bg-secondary" href="{{ route('cart.index') }}">Carrito</a>
          <a class="nav-link active bg-secondary" href="{{ route('home.about') }}">Nosotros</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active bg-secondary" href="{{ route('login') }}">Accede</a>
          <a class="nav-link active bg-secondary" href="{{ route('register') }}">Registrate</a>
          @else
          <a class="nav-link active bg-secondary" href="{{ route('myaccount.orders') }}">Mis Pedidos</a>
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active bg-secondary"
               onclick="document.getElementById('logout').submit();">Salir</a>
            @csrf
          </form>
          @endguest
        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2 class="subtitulo">@yield('subtitle', 'La mejor tienda de peluches')</h2>
    </div>
  </header>
  <!-- header -->

  @yield('content')
  
  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <b>José Andrés</b> - <b>José Manuel</b> - <b>José María</b>
      </small>
    </div>
  </div>
  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>
