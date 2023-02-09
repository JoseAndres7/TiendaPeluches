@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Editar Comentario
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.comentario.update', ['id'=> $viewData['comentario']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Descripcion:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="descripcion" value="{{ $viewData['comentario']->getDescripcion() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Valoracion:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="valoracion" value="{{ $viewData['comentario']->getValoracion() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">ID del Producto:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="product_id" value="{{ $viewData['comentario']->getProductId() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>  
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">ID del Usuario:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="user_id" value="{{ $viewData['comentario']->getUserId() }}" type="text" class="form-control" readonly>
            </div>
          </div>
        </div>  
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
</div>
@endsection
