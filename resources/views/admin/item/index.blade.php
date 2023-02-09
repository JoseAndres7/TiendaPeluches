@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    Gestionar usuarios
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio</th>
          <th scope="col">Id de la Orden</th>
          <th scope="col">Id del Producto</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["items"] as $item)
        <tr>
          <td>{{ $item->getId() }}</td>
          <td>{{ $item->getQuantity() }}</td>
          <td>{{ $item->getPrice() }}</td>
          <td>{{ $item->getOrderId() }}</td>
          <td>{{ $item->getProductId() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.item.edit', ['id'=> $item->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.item.delete', $item->getId())}}" method="POST">
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
