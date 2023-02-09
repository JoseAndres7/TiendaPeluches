@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container my-4">
<div class="card-1">
  <div class="card-header">
    Compra completada
  </div>
  <div class="card-body">
    <div class="alert alert-success" role="alert">
      Enhorabuena, compra completada. El número de pedido es <b>#{{ $viewData["order"]->getId() }}</b>
    </div>
  </div>
</div>
</div>
@endsection
