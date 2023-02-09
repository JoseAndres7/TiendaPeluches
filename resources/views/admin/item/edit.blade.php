@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Editar Usuario
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.item.update', ['id'=> $viewData['item']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cantidad:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="quantity" value="{{ $viewData['item']->getQuantity() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['item']->getPrice() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Order Id:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="order_id" value="{{ $viewData['item']->getOrderId() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
        </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Product Id:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="product_id" value="{{ $viewData['item']->getProductId() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
</div>
@endsection
