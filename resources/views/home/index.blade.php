@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('/img/slider1.jpeg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <a href="/products"><img src="{{ asset('/img/slider2.jpeg') }}" class="d-block w-100" alt="..."></a>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/img/slider4.jpeg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<header class="masthead bg-primary text-white text-center py-4">
<div class="container d-flex align-items-center flex-column mas-vendidos">
    <h2 class="subtitulo">Peluches De Pokèmon Más Vendidos</h2>
</div>
</header>
<div class="container my-4">
    <div class="row" id="row">
      @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-4 mb-2">
            <div class="card-2">
                <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn">
                    <img src="{{ asset('/img/'.$product->getImage()) }}" class="card-img-top img-card">
                </a>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('/img/pokeball.png') }}" class="img-fluid" width="100px" height="100px">
                <a href="{{ route('product.show', ['id'=> $product->getId()]) }}"
                class="btn bg-secondary nombre-pokemons text-white">{{ $product->getName() }}</a>
            </div>
        </div>
      @endforeach
      <div class="vertodos">
        <img src="{{ asset('/img/pokeball.png') }}" class="img-fluid" width="100px" height="100px">
        <a href="{{ route('product.index')}}"
        class="btn bg-secondary nombre-pokemons text-white">Ver Todos</a>
      </div>
    </div>
</div>
@endsection
