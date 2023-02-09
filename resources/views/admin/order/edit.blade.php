@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Editar Pedido
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.order.update', ['id'=> $viewData['order']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Total:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="total" value="{{ $viewData['order']->getTotal() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">ID Usuario:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="user_id" value="{{ $viewData['order']->getUserId() }}" type="number" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
</div>
@endsection
