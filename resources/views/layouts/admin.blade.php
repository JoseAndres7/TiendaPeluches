<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <link rel="icon" href="/img/pokeball.png"/>
  <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body>
  <div class="row g-0 general-body">
    <!-- sidebar -->
    <div class="p-3 col fixed text-white bg-dark">
      <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
        <span class="fs-4">Panel de administrador</span>
      </a>
      <hr />
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- Admin - Inicio</a></li>
        <li><a href="{{ route('admin.item.index') }}" class="nav-link text-white">- Admin - Item</a></li>
        <li><a href="{{ route('admin.order.index') }}" class="nav-link text-white">- Admin - Pedidos</a></li>
        <li><a href="{{ route('admin.user.index') }}" class="nav-link text-white">- Admin - Usuarios</a></li>
        <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- Admin - Productos</a></li>
        <li><a href="{{ route('admin.comentario.index') }}" class="nav-link text-white">- Admin - Comentarios</a></li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Volver al Inicio</a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col content-grey">
      <nav class="p-3 shadow text-end">
        <span class="profile-font">Admin</span>
        <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
      </nav>

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
  </div>

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
