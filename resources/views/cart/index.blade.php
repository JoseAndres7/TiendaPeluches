@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container my-4">
<div class="card-1">
  <div class="card-header">
    Productos en el Carrito
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Imagen</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr class="carrito">
          <td><img src="{{ asset('/img/'.$product->getImage()) }}" class="imgcart"></td>
          <td class="cartcompra">{{ $product->getName() }}</td>
          <td class="cartcompra">${{ $product->getPrice() }}</td>
          <td class="cartcompra">{{ session('products')[$product->getId()] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="text-end">
        <a class="btn btn-secondary mb-2"><b>Tota a pagar:</b> ${{ $viewData["total"] }}</a>
        @if (count($viewData["products"]) > 0)
        <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Comprar</a>
        <a href="{{ route('cart.delete') }}">
          <button class="btn btn-danger mb-2">
            Eliminar todos los productos del carrito
          </button>
        </a>
        @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection
