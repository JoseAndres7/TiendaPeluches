@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@forelse ($viewData["orders"] as $order)
<div class="container my-4">
<div class="card-1 mb-4">
  <div class="card-header">
    Pedido #{{ $order->getId() }}
  </div>
  <div class="card-body">
    <b>Fecha:</b> {{ $order->getCreatedAt() }}<br />
    <b>Total:</b> ${{ $order->getTotal() }}<br />
    <table class="table table-bordered table-striped text-center mt-3">
      <thead>
        <tr>
          <th scope="col">Item ID</th>
          <th scope="col">Nombre del producto</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order->getItems() as $item)
        <tr>
          <td>{{ $item->getId() }}</td>
          <td>
            <a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
              {{ $item->getProduct()->getName() }}
            </a>
          </td>
          <td>${{ $item->getPrice() }}</td>
          <td>{{ $item->getQuantity() }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
@empty
<div class="container my-4">
<div class="alert alert-danger" role="alert">
  Parece que no has comprado nada en nuestra tienda =(.
</div>
</div>
@endforelse
@endsection
