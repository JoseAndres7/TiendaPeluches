@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<div class="card">
  <div class="card-header">
    Gestionar Comentarios
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Valoracion</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Nombre Usuario</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["comentarios"] as $comentario)
        <tr>
          <td>{{ $comentario->getId() }}</td>
          <td>
          <?php
            $valoracion = $comentario->getValoracion();
            for($i = 0; $i < $valoracion; $i++){
                echo '<span class="fa fa-star" style="color:orange"></span>';
            }
            for($i = 0; $i < 5 - $valoracion; $i++){
                echo '<span class="fa fa-star"></span>';
            }
            ?>
          </td>
          <td>{{ $comentario->getDescripcion() }}</td>
          <td>{{ $comentario->ProductId->getName() }}</td>
          <td>{{ $comentario->UserId->getName() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.comentario.edit', ['id'=> $comentario->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.comentario.delete', $comentario->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
