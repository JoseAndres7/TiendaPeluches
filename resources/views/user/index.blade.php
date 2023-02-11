@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container my-4">
<div class="card-1 mb-4">
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

    <form class="formUser" method="POST" action="{{ route('user.update', ['id'=> $viewData['usuario']->getId()]) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['usuario']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Email:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="email" value="{{ $viewData['usuario']->getEmail() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Contraseña:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="password" value="{{ $viewData['usuario']->getEmail() }}" type="hidden" class="form-control">
              <input name="password2" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 row">
          <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Imagen:</label>
          <div class="col-lg-10 col-md-6 col-sm-12">
            <input class="form-control" type="file" name="imagen">
          </div>
        </div>
      </div>
      <input type="hidden" name="role" value="{{ $viewData['usuario']->getRole() }}">
      <input type="hidden" name="balance" value="{{ $viewData['usuario']->getBalance() }}">
      <button type="submit" class="btn btn-primary editarUser">Editar</button>
    </form>
  </div>
</div>
</div>
@endsection
